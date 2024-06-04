<?php
// Load existing tasks from tasks.json
$tasksFile = 'tasks.json';
if (file_exists($tasksFile)) {
    $tasksData = json_decode(file_get_contents($tasksFile), true);
} else {
    $tasksData = [];
}

// Get the search term if it exists
$searchUserName = isset($_GET['user_name']) ? $_GET['user_name'] : '';

function filterTasksByUserName($tasks, $userName) {
    return array_filter($tasks, function($task) use ($userName) {
        return stripos($task['user_name'], $userName) !== false;
    });
}

// Filter tasks based on the search term
if ($searchUserName !== '') {
    $tasksData = filterTasksByUserName($tasksData, $searchUserName);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>
    <form method="get" action="list_tasks.php">
        <label for="user_name">Search by User Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars($searchUserName); ?>">
        <input type="submit" value="Search">
    </form>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Date Creation</th>
            <th>Date Updated</th>
            <th>User Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasksData as $id => $task): ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo htmlspecialchars($task['name']); ?></td>
            <td><?php echo htmlspecialchars($task['description']); ?></td>
            <td><?php echo htmlspecialchars($task['status']); ?></td>
            <td><?php echo htmlspecialchars($task['date_creation']); ?></td>
            <td><?php echo htmlspecialchars($task['date_updated']); ?></td>
            <td><?php echo htmlspecialchars($task['user_name']); ?></td>
            <td>
                <a href="edit_task.php?task_id=<?php echo $id; ?>">Update</a>
                <form action="delete_task.php" method="post" style="display:inline;">
                    <input type="hidden" name="task_id" value="<?php echo $id; ?>">
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this task?');">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <h2>Add New Task</h2>
    <form action="submit_task.php" method="post">
        <label for="name">Task Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="user_name">User Name:</label><br>
        <input type="text" id="user_name" name="user_name" required><br><br>

        <input type="submit" value="Add Task">
    </form>
</body>
</html>
