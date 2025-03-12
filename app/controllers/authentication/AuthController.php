<?php

namespace App\controllers\authentication;

use App\entities\UserEntity;
use App\repositories\UserRepository;
use Core\helper\DateTimeAsia;
use Core\helper\Mapper;
use Ramsey\Uuid\Uuid;
use Exception;

class AuthController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $id = Uuid::uuid4()->toString();
                $username = trim($_POST['username'] ?? '');
                $email = trim($_POST['email'] ?? '');
                $emailVerifiedAt = null;
                $password = $_POST['password'] ?? '';
                $confirmPassword = $_POST['confirm_password'] ?? '';
                $role = 'user';
                $avatar = null;
                $bio = null;
                $status = 'active';
                $token = null;
                $token256 = null;
                $createdAt = DateTimeAsia::now();
                $updatedAt = DateTimeAsia::now();
                $deletedAt = null;

                $errorText = [];
    
                // Kiểm tra dữ liệu đầu vào
                if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
                    $errorText[] = ("Vui lòng nhập đầy đủ thông tin!");
                }
    
                // Kiểm tra email hợp lệ
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorText[] = ("Email không hợp lệ!");
                }

                // Kiểm tra xem email đã tồn tại chưa
                $existUser = $this->userRepository->getUserByEmail($email);
                if ($existUser) {
                    $errorText[] = ("Email đã được sử dụng!");
                }
    
                // Kiểm tra password trùng
                if ($password !== $confirmPassword) {
                    $errorText[] = ("Mật khẩu nhập lại không khớp!");
                }
    
                // Kiểm tra độ mạnh của mật khẩu
                if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
                    $errorText[] = ("Mật khẩu phải có ít nhất 8 ký tự, gồm chữ hoa, chữ thường, số và ký tự đặc biệt!");
                }

                if (!empty($errorText)) {
                    throw new Exception(implode("\n", $errorText));
                }

                $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
                
                $user = new UserEntity (
                    id: $id,
                    username: $username,
                    email: $email,
                    emailVerifiedAt: $emailVerifiedAt,
                    password: $hashedPassword,
                    role: $role,
                    avatar: $avatar,
                    bio: $bio,
                    status: $status,
                    token: $token,
                    token256: $token256,
                    createdAt: $createdAt,
                    updatedAt: $updatedAt,
                    deletedAt: $deletedAt                
                );
    
                $this->userRepository->create($user);
    
                echo "Đăng ký thành công!";
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                echo $e->getMessage();
            }
            
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $email = trim($_POST['email'] ?? '');
                $password = $_POST['password'] ?? '';
                $rememberMe = isset($_POST['remember_me']);
    
                if (empty($email) || empty($password)) {
                    throw new Exception("Vui lòng nhập đầy đủ email và mật khẩu!");
                }
    
                $user = $this->userRepository->getUserByEmail($email);
                if (!$user || !password_verify($password, $user->getPassword())) {
                    throw new Exception("Email hoặc mật khẩu không chính xác!");
                }
    
                // Lưu session
                $_SESSION['user_id'] = $user->getId();
    
                if ($rememberMe) {
                    $token = bin2hex(random_bytes(32));
                    $hashedToken = password_hash($token, PASSWORD_ARGON2ID);
                    $this->userRepository->updateRememberToken($user->getId(), $hashedToken);
    
                    setcookie('remember_token', $token, time() + (7 * 24 * 60 * 60), "/", "", true, true);
                }
    
                echo "Đăng nhập thành công!";
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
                echo $e->getMessage();
            }
        }
    }

    public function logout()
    {
        $userId = $_SESSION['user_id'];
        try {
            if (isset($userId)) {
                $this->userRepository->updateRememberToken($userId, "NULL");
            }
    
            session_destroy(); // Xóa session
            setcookie('remember_token', '', time() - 3600, "/", "", true, true);
    
            echo "Đã đăng xuất!";
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            echo $e->getMessage();
        }
    }

    public function autoLogin()
    {
        try {
            if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
                $token = $_COOKIE['remember_token'];
                $user = $this->userRepository->getUserByRememberToken($token);

                if ($user) {
                    if (!empty($token) && password_verify($token, $user['remenber_token'])) {
                        $_SESSION['user_id'] = $user->getId();
                    } else {
                        throw new Exception("Token trống hoặc không hợp lệ.");
                    }
                } else {
                    throw new Exception("Không tìm thấy người dùng với token đã lưu.");
                }
            }
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            setcookie('remember_token', '', time() - 3600, "/", "", false, true);
        }
    }

}
