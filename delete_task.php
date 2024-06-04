<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the task ID from the POST data
    $task_id = $_POST['task_id'];

    // Load existing tasks from tasks.json
    $tasksFile = 'tasks.json';
    if (file_exists($tasksFile)) {
        $tasksData = json_decode(file_get_contents($tasksFile), true);
    } else {
        echo "No tasks found!";
        exit;
    }

    // Check if the task_id is valid
    if (!isset($tasksData[$task_id])) {
        echo "Task ID not found!";
        exit;
    }

    // Remove the task from the tasks array
    unset($tasksData[$task_id]);

    // Save the updated tasks array back to the tasks.json file
   
    file_put_contents($tasksFile, json_encode(array_values($tasksData), JSON_PRETTY_PRINT));

    // Redirect to the task list page
    header('Location: list_tasks.php');
    exit;
}
?>

