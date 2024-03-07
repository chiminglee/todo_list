<?php
require 'db.php';

$sql = "SELECT id, task, is_completed FROM tasks ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO List</title>
</head>
<body>
    <h2>TODO List</h2>
    <a href="create.php">新增待辦事項</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>待辦事項</th>
                <th>狀態</th>
                <th>管理</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['task']); ?></td>
                    <td><?php echo $row['is_completed'] ? '已完成' : '未完成'; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">修改</a> | 
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">刪除</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        function confirmDelete(id) {
            if (confirm('確定要刪除這個待辦事項嗎？')) {
                window.location.href = 'destroy.php?id=' + id;
            }
        }
    </script>
</body>
</html>
