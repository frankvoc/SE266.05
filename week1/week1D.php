<?php

//creating the array
$task = array(
    'title' => 'buy groceries',
    'due' => 'tomorrow',
    'assigned_to' => 'mom',
    'completed' => 'no'
);

//print the associative array
foreach ($task as $key => $value) {
    echo $key . ': ' . $value . "<br>";
}
//var_dump($task)


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 1D</title>
</head>
<body>
    <!-- Inside HTML -->
    <ul>
        <?php foreach($task as $thing) : ?>
            <li><?=$thing; ?></li>
        <?php endforeach; ?>
    </ul>
    <h1><a href="test.php">Back to Home</a></h1>
</body>
</html>