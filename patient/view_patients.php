<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Patients</title>
</head>
<body>
    <div class="container">
                
     <div class="col-sm-12">
        <h1>Patients</h1>
        <?php if(isset($_SESSION['users'])): ?>
            <h4>Welcome <?= $_SESSION['users']; ?></h4>
            <b><a href="search_teams.php">Search Patients</a></b><br>
            <!-- <b><a href="logout.php">Logout</a></b><br> -->
        <?php else: ?>
        <b><a href="login.php">Login</a></b><br>
        <?php endif; ?>
        <a href="addPatient.php">Add New Patient</a>
    <?php
        include __DIR__ . '/model/model_patient.php';
        include __DIR__ . '/functions.php';
        
        if(isset($_POST['deleteTeam'])){
            $id = filter_input(INPUT_POST, 'teamId');
            deleteTeam($id);
        }

        $patients = getPatients(); 
    ?>
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married</th>
                    <th>Birth Date</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($patients as $p):                 
            ?>
                <tr>
                    <td><?= $p['id']; ?></td> 
                    <td><?= $p['patientFirstName']; ?></td>
                    <td><?= $p['patientLastName']; ?></td> 
                    <td><?= $p['patientMarried']; ?></td> 
                    <td><?= $p['patientBirthDate']; ?></td> 
                    <!-- LINK FOR UPDATE FUNCTIONALITY -> Look at how we are passing in our ID using PHP! -->
                    <!-- <td><a href="edit_team.php?action=Update&teamId=<?= $t['id']; ?>">Edit</a></td>         -->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br />
        <!-- <a href="addPatient.php?action=Add">Add New Patient</a> -->
    </div>
    </div>
</body>
</html>
