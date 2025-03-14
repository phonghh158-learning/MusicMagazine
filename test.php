<?php
function randomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Tạo mảng và thêm 3 chuỗi ngẫu nhiên
$arr = [];
for ($i = 0; $i < 3; $i++) {
    $arr[] = randomString();
}

// Thêm 3 chuỗi cố định vào mảng
$arr[] = '1911060514';
$arr[] = 'HongPhongHoang';
$arr[] = '12LS';

// Xáo trộn mảng 3 lần
for ($i = 0; $i < 3; $i++) {
    shuffle($arr);
}

// Nối các phần tử thành một chuỗi
$result = implode('', $arr);

echo $result;

$config = require_once __DIR__ . '/config/app.php';
echo $config['secret_key_256'];
?>
