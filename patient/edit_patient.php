<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
</head>
<div class="col-sm-offset-1 col-sm-10"><p><a href="./view_patients.php">View Patients</a></p></div>
<body>
<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/model_patient.php';
    include __DIR__ . '/functions.php';
    
    $error = "";

    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'Id');
        if($action == "Update"){
            $patient = getPatient($id);
            $firstName = $patient["patientFirstName"];
            $lastName = $patient['patientLastName'];
            $married = $patient['patientMarried'];
            $birthDate = $patient['patientLastName'];
            $birthDate = date('Y-m-d H:i:s');
        }else{
            $firstName = "";
            $lastName = "";
            $married="";
            $birthDate="";
        }
    }elseif (isset($_POST['Update_patient'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'id');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $married = filter_input(INPUT_POST, 'married');
        $birthDate = filter_input(INPUT_POST, 'birthDate');
        updatePatient($id, $firstName, $lastName, $married, $birthDate);
        header('Location: view_patients.php');
    }elseif (isset($_POST['Add_patient'])){
        $action = filter_input(INPUT_POST, 'action');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $married = filter_input(INPUT_POST, 'married');
        $birthDate = filter_input(INPUT_POST, 'birthDate');

        
        addPatient($firstName, $lastName, $married, $birthDate);
        header('Location: view_patients.php');
    }
    if ($action == "Update") {
        $patient = getPatient($id);
        $firstName = $patient["patientFirstName"];
        $lastName = $patient['patientLastName'];
        $married = $patient['patientMarried'];
        $birthDate = $patient['patientBirthDate']; // Ensure correct column name is used
    } else {
        $firstName = "";
        $lastName = "";
        $married = ""; // Set default value for married status if needed
        $birthDate = "";
    }

?>

    <style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>
    <h2><?= $action; ?> Patient</h2>
    <form name="patient" method="post" action="edit_patient.php">

        <div class="wrapper">
            <input type="hidden" name="id" value="<?= $id; ?>" />
            <div class="label">
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="firstName" value="<?= $firstName; ?>" />
            </div>
            <div class="label">
                <label>Last Name:</label>
            </div>
            <div>
                <input type="text" name="lastName" value="<?= $lastName; ?>" />
            </div>
            <div class="label">
                <label>Married:</label>
            </div>
            <div>
                <input type="radio" name="married" value="1" <?= $married == 1 ? 'checked' : '' ?> /> Yes
                <input type="radio" name="married" value="0" <?= $married == 0 ? 'checked' : '' ?> /> No
            </div>
            <div class="label">
                <label>Birth Date:</label>
            </div>
            <div>
                <input type="date" name="birthDate" value="<?= $birthDate ?>" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="<?= $action; ?>_patient" value="<?= $action; ?> Patient Information" />
            </div>
           
        </div>

       
    </form>
    <p>
       
    </p>


    </body>
</html>