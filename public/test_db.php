<?php

use core\Database;

$db = Database::getInstance()->getConnection();

if ($db) {
    echo "Kết nối thành công!";
} else {
    echo "Kết nối thất bại!";
}
