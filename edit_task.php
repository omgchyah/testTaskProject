<?php
// Load existing tasks from tasks.json
$tasksFile = 'tasks.json';
if (file_exists($tasksFile)) {
    $tasksData = json_decode(file_get_contents($tasksFile), true);
} else {
    $tasksData = [];
}

// Get the task ID from the query parameter
if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    if (isset($tasksData[$task_id])) {
        $task = $tasksData[$task_id];
    } else {
        echo "Task not found!";
        exit;
    }
} else {
    echo "No task ID provided!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="update_task.php" method="post">
        <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">

        <label for="name">Task Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($task['name']); ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo htmlspecialchars($task['description']); ?></textarea><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="active" <?php echo $task['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
            <option value="pending" <?php echo $task['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="completed" <?php echo $task['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
        </select><br><br>

        <input type="submit" value="Update Task">
    </form>
</body>
</html>
