<?php 
$title = "Đăng ký tài khoản";
$css = '/assets/css/auth.css'; 

$content = '
    <section class="register-section">
        <div class="title">
            <p>Register</p>
        </div>
        <form class="register-form" method="POST" action="/register">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                            
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                            
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                            
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                            
            <button type="submit">Register</button>
        </form>
    </section>
';

include __DIR__ . '/../layout/layout.php';

?>