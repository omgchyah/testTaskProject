<?php
require_once 'Task.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $task_id = $_POST['task_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $current_date = date('Y-m-d H:i:s');

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

    // Update the task details
    $tasksData[$task_id]['name'] = $name;
    $tasksData[$task_id]['description'] = $description;
    $tasksData[$task_id]['status'] = $status;
    $tasksData[$task_id]['date_updated'] = $current_date;

    // Save the updated tasks array back to the tasks.json file
    file_put_contents($tasksFile, json_encode($tasksData, JSON_PRETTY_PRINT));

    // Redirect to the task list page
    header('Location: list_tasks.php');
    exit;
}
