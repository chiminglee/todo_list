<?php

$host = 'localhost'; // MySQL server ip
$dbname = 'todo_list';
$user = 'center61'; // MySQL 使用者帳號
$password = 'catPlayIn2024'; // MySQL密碼

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "數據庫連接失敗: " . $e->getMessage();
}
?>
