<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task Form</title>
</head>
<body>
    <h1>Update Task Form</h1>
    <form action="update_task.php" method="post">
        <label for="task_id">Task ID:</label><br>
        <input type="number" id="task_id" name="task_id" required><br><br>

        <label for="name">Task Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select><br><br>

        <input type="submit" value="Update Task">
    </form>
</body>
</html>
