<?php
    for($i = 1; $i<=100; $i++)
    {
        if($i % 6 == 0)
        {
            echo $i . ' FizzBuzz<br>';
        }
        elseif($i % 2 == 0)
        {
            echo $i . ' Fizz<br>';
        }
        elseif($i % 3 == 0)
        {
            echo $i . ' Buzz<br>';
        }
        else{
            echo $i , ' <br>';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Week 1G</title>
</head>
<body>
</body>
<footer class="bg-dark text-white text-center py-3" style="position: fixed; bottom: 0; left: 0; right: 0;">
  <div><a href="../site/index.php">Back to Home</a></div>
</html>