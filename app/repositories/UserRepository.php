<?php

    namespace App\Repositories;

    use App\Entities\UserEntity;
    use App\Repositories\BaseRepository;
    use Core\helper\Mapper;
    use PDO;
    use PDOException;

    class UserRepository extends BaseRepository
    {
        public function __construct()
        {
            parent::__construct('users', UserEntity::class);
        }

        public function getUserByEmail(string $email): ?UserEntity
        {
            try {
                $sqlQuery = $this->pdo->prepare(
                    "SELECT * FROM {$this->table} 
                    WHERE email = :email AND deleted_at IS NULL 
                    LIMIT 1"
                );
                $sqlQuery->execute(['email' => $email]);
                $data = $sqlQuery->fetch(PDO::FETCH_ASSOC);

                return $data ? Mapper::DataToEntity(UserEntity::class, $data) : null;
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return null;
            }
        }

        public function getToken($token) {
            $sqlQuery = $this->pdo->query(
                "SELECT remember_token FROM {$this->table}
                WHERE remember_token = :remember_token"
            );
            $sqlQuery->execute(['remember_token' => $token]);
            $data = $sqlQuery->fetch(PDO::FETCH_ASSOC);
            return $data['remember_token'] ?? null;
        }

        public function getUserByRememberToken(string $token): ?UserEntity {
            try {
                $sqlQuery = $this->pdo->prepare("SELECT * FROM users WHERE remember_token = :token");
                $sqlQuery->execute(['token' => $token]);
                $userData = $sqlQuery->fetch(PDO::FETCH_ASSOC);
                
                return $userData ? Mapper::DataToEntity(UserEntity::class, $userData) : null;
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return null;
            }
        }

        public function updateRememberToken(string $userId, string $token): void {
            try {
                $sqlQuery = $this->pdo->prepare("UPDATE {$this->table} SET remember_token = :token WHERE id = :id");
                $sqlQuery->execute(['token' => $token, 'id' => $userId]);
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                echo "Error: " . $e->getMessage();
            }
        }
        
    }

?>
