<?php
require 'db.php';

$id = $_GET['id'] ?? ''; // PHP 7.0+ 的null合併運算符
if ($id) {
    $sql = "SELECT id, task, is_completed FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$task) {
    echo "待辦事項不存在";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>編輯待辦事項</title>
</head>
<body>
    <h2>編輯待辦事項</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
        <label for="task">待辦事項描述:</label>
        <input type="text" id="task" name="task" value="<?php echo htmlspecialchars($task['task']); ?>" required>
        <label><input type="checkbox" name="is_completed" value="1" <?php echo $task['is_completed'] ? 'checked' : ''; ?>> 完成</label>
        <input type="submit" value="更新">
    </form>
</body>
</html>
