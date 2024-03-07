<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $is_completed = !empty($_POST['is_completed']) ? 1 : 0;

    $sql = "UPDATE tasks SET task = :task, is_completed = :is_completed WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['task' => $task, 'is_completed' => $is_completed, 'id' => $id]);

    echo "任務已更新。您將在5秒後回首頁。";
    header("refresh:5;url=list_tasks.php");
    exit;
}
?>
