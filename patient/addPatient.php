<?php
  
  // This code runs everything the page loads
  include __DIR__ . '/model/model_patient.php';
  include __DIR__ . '/functions.php';
  if (isPostRequest()) {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $married = filter_input(INPUT_POST, 'married');
    $birthDate = filter_input(INPUT_POST, 'birthDate');
    $birthDate = date('Y-m-d H:i:s');
    $result = addPateint ($firstName, $lastName, $married, $birthDate);    
  }
?>
    

<html lang="en">
<head>
  <title>Add Patients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">


  <h1>Add Patient</h1>
  <div class="col-sm-offset-1 col-sm-10"><p><a href="./view_patients.php">View Patients</a></p></div>
  <form class="form-horizontal" action="addPatient.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="first name">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Last Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Married:</label>
      <div class="col-sm-10">          
      <input type="radio" name="married" value="1">Yes
      <input type="radio" name="married" value="0">No
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Birthdate:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="birthDate" placeholder="Enter Birtdate... ex: 2019-11-26" name="birthDate">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add Patient</button>
        <?php
            if (isPostRequest()) {
                echo "Patient Added";
            }
        ?>
      </div>
    </div>
  </form>
  
</div>

</body>
</html>