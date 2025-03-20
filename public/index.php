<?php

require_once __DIR__ . '/../Core/Router.php';
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../core/Database.php';

use Core\Router;
use core\Database;

Router::dispatch();

$db = Database::getInstance()->getConnection();

if ($db) {
    echo "\nKết nối thành công!";
} else {
    echo "\nKết nối thất bại!";
}

?>