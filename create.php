<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增待辦事項</title>
</head>
<body>
    <h2>新增待辦事項</h2>
    <form action="store.php" method="post">
        <label for="task">待辦事項描述:</label>
        <input type="text" id="task" name="task" required>
        <input type="submit" value="新增">
    </form>
</body>
</html>
