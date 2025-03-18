<?php

    function hashPassword() {
        $password = 'Password@123';
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        return $hash;
    }

    echo hashPassword(); //$argon2id$v=19$m=65536,t=4,p=1$aEgvZDdXamJEQU9OM2M5TQ$xcoc7aJzaEmS94FUUdvC7pXktbHPgwX8Rf4vpQbAC1E

    function verifyPassword() {
        $hash = '$argon2id$v=19$m=65536,t=4,p=1$aEgvZDdXamJEQU9OM2M5TQ$xcoc7aJzaEmS94FUUdvC7pXktbHPgwX8Rf4vpQbAC1E';
        $password = 'Password@123';
        if (password_verify($password, $hash)) {
            return 'Password is valid!';
        } else {
            return 'Invalid password.';
        }
    }

    echo "\n" . verifyPassword(); //Password is valid!
    
?>