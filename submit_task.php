<?php
require_once 'Task.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $user_name = $_POST['user_name'];

    // Set default values
    $status = "Active";
    $current_date = date('Y-m-d H:i:s');

    // Load existing tasks from tasks.json
    $tasksFile = 'tasks.json';
    if (file_exists($tasksFile)) {
        $tasksData = json_decode(file_get_contents($tasksFile), true);
    } else {
        $tasksData = [];
    }

    // Check for unique task name
    foreach ($tasksData as $task) {
        if (strcasecmp($task['name'], $name) == 0) {
            echo "A task with the name '$name' already exists. Please choose a different name.";
            exit;
        }
    }

    // Create a new Task instance
    $task = new Task($name, $description, $status, $current_date, $current_date, $user_name);

    // Convert the task object to an associative array
    $taskArray = [
        'name' => $task->getName(),
        'description' => $task->getDescription(),
        'status' => $task->getStatus(),
        'date_creation' => $task->getDateCreation(),
        'date_updated' => $task->getDateUpdated(),
        'user_name' => $task->getUserId()
    ];

    // Add the new task to the tasks array
    $tasksData[] = $taskArray;

    // Save the tasks array back to the tasks.json file
    file_put_contents($tasksFile, json_encode($tasksData, JSON_PRETTY_PRINT));

    // Redirect to the task list page
    header('Location: list_tasks.php');
    exit;
}
?>
