<?php

//creating the array
$task = array(
    'title' => 'buy groceries',
    'due' => 'tomorrow',
    'assigned_to' => 'mom',
    'completed' => true
);

//var_dump($task)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Week 1D</title>
</head>
<body>
    <h1>Tasks for the Week</h1>
    <!-- Inside HTML -->
    <ul>
    <!-- <?php foreach($task as $key => $value) : ?>
            <li><?= $key . ': ' . $value; ?></li>
        <?php endforeach; ?>
    </ul> -->
    <ul>
        <li>
            <strong>Task: </strong><?= $task['title'];?>
        </li>
        <li>
            <strong>Do IT: </strong><?= $task['due'];?>
        </li>
        <li>
            <strong>Who Does it: </strong><?= $task['assigned_to'];?>
        </li>
        <li>
            <strong>Status: </strong>
            <?= $task['completed'] ? '&#9989' : '&#10060' ;?>
        </li>
    </ul>
</body>
<footer class="bg-dark text-white text-center py-3" style="position: fixed; bottom: 0; left: 0; right: 0;">
  <div><a href="../site/index.php">Back to Home</a></div>
</html>