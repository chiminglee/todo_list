<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['task'])) {
    $task = $_POST['task'];

    $sql = "INSERT INTO tasks (task) VALUES (:task)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['task' => $task]);

    echo "待辦事項已新增。您將在5秒後回首頁。";
    header("refresh:5;url=index.php");
    exit;
}
?>
