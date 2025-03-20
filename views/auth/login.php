<?php 
$title = "Đăng nhập";
$css = '/assets/css/auth.css'; 

$content = '
    <section class="login-section" method="POST" action="/login">
        <div class="title">
            <p>Login</p>
        </div>
        <form class="login-form">
            <label for="login-username">Username</label>
            <input type="text" id="login-username" name="username" required>
                        
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" required>
                        
            <button type="submit">Login</button>
        </form>
    </section>
';

include __DIR__ . '/../layout/layout.php';

?>