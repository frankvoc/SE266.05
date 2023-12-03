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
        <b><a href="addPatient.php">Add New Patient</a></b>
        <br>
        <b><a href="search_patient.php">Search Patients</a></b>
    <?php
        include __DIR__ . '/model/model_patient.php';
        include __DIR__ . '/functions.php';
        
        if(isset($_POST['deletePatient'])){
            $id = filter_input(INPUT_POST, 'id');
            deletePatient($id);
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
                    <th>Edit/Update</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($patients as $p):                 
            ?>
                  <tr>
                    <td>
                        <!-- FORM FOR DELETE FUNCTIONALITY -->
                        <form action='view_patients.php' method='post'>
                            <input type="hidden" name="id" value="<?= $p['id'];?>"/>
                            <input class="" type="submit" name="deletePatient" value="Delete" />
                            <?= $p['id']; ?>
                        </form>
                    </td>
                    <td><?= $p['patientFirstName']; ?></td>
                    <td><?= $p['patientLastName']; ?></td>
                    <td><?= $p['patientMarried'] == 1 ? 'Yes' : 'No' ?></td>
                    <td><?= $p['patientBirthDate']; ?></td> 
                    <!-- LINK FOR UPDATE FUNCTIONALITY -> Look at how we are passing in our ID using PHP! -->
                    <td><a href="edit_patient.php?action=Update&Id=<?= $p['id']; ?>">Edit</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br />
    </div>
    </div>
</body>
</html>
