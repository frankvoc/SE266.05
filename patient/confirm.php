<!DOCTYPE html>
<html>
<head>
  <title>Confirmation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Confirmation</h1>
    <div class="card">
      <div class="card-body">
        <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
        <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
        <p><strong>Married:</strong> <?php echo ($married === "yes") ? "Yes" : "No"; ?></p>
        <p><strong>Birth Date:</strong> <?php echo $birthDate; ?></p>
        <p><strong>Height:</strong> <?php echo $height; ?> cm</p>
        <p><strong>Weight:</strong> <?php echo $weight; ?> kg</p>
        <p><strong>Patient Age:</strong> <?php echo $age; ?> years</p>
        <p><strong>BMI:</strong> <?php echo $bmi; ?></p>
        <p><strong>Classification:</strong> <?php echo $classification; ?></p>
      </div>
    </div>
  </div>
</body>
</html>
