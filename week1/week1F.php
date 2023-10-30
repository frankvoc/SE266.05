<?php
function canEnterClub($age) {
    if ($age >= 21) {
        return true;  //21 or older = enter
    } else {
        return false; //20 or under = no enter
    }
}

//example numbers
$age1 = 23;
$age2 = 15;
//defining new vari canEnter for age 1 and 2 that will take Age 1 and 2 as an argument.
$canEnter1 = canEnterClub($age1);
$canEnter2 = canEnterClub($age2);
//outputs using checks and x's
//similar to the Boolean in week1E
echo "Person 1 (age $age1) can enter the club: " . ($canEnter1 ? "&#9989" : "&#10060") . "<br>";
echo "Person 2 (age $age2) can enter the club: " . ($canEnter2 ? "&#9989" : "&#10060") . "<br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Week 1F</title>
</head>
<body>
</body>
<footer class="bg-dark text-white text-center py-3" style="position: fixed; bottom: 0; left: 0; right: 0;">
  <div><a href="../site/index.php">Back to Home</a></div>
</html>