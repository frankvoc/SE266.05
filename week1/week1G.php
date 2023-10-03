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
    <title>Week 1G</title>
</head>
<body>
<h1><a href="test.php">Back to Home</a></h1>
</body>
</html>