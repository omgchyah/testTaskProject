<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
</head>
<body>
    <h1>Task Form</h1>
    <form action="submit_task.php" method="post">
        <label for="name">Task Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="user_name">User Name:</label><br>
        <input type="text" id="user_name" name="user_name" required><br><br>

        <input type="submit" value="Submit Task">
    </form>
</body>
</html>
