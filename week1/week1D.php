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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Week 1D</title>
</head>
<body>
    <!-- Inside HTML -->
    <ul>
        <?php foreach($task as $thing) : ?>
            <li><?=$thing; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
<footer class="bg-dark text-white text-center py-3" style="position: fixed; bottom: 0; left: 0; right: 0;">
  <div><a href="../site/index.php">Back to Home</a></div>
</html>