<?php
    include __DIR__ . '/model/model_patient.php';
    include __DIR__ . '/functions.php';

    //Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searchTerm = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'married_status' => $_POST['married_status'],
        ];
        $searchResults = searchPatients($searchTerm['first_name'], $searchTerm['last_name'], $searchTerm['married_status']);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Patients</title>
<body>
    <div class="container">
    <h1>Search Patients</h1>
    <div><p><a href="./view_patients.php">View Patients</a></p></div>
<form method="POST" name="search_patients" class="form-inline mb-3">
<div class="form-group">
    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?= isset($firstName) ? $firstName : '' ?>">
</div>
<div class="form-group">
    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="<?= isset($lastName) ? $lastName : '' ?>">
</div>
<div class="form-group">
    <label>Married Status:</label>
    <select name="married_status" class="form-control">
        <option value="">Select</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>
<button type="submit" name="search" class="btn btn-primary">Search</button>
</form>
    <?php if (isset($searchResults) && !empty($searchResults)) : ?>
        <h2>Search Results:</h2>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Married</th>
                <th>Birth Date</th>
            </tr>
            <?php foreach ($searchResults as $p) : ?>
                <tr>
                    <td><?= $p['id'] ?></td>
                    <td><?= $p['patientFirstName'] ?></td>
                    <td><?= $p['patientLastName'] ?></td>
                    <td><?= $p['patientMarried'] == 1 ? 'Yes' : 'No' ?></td>
                    <td><?= $p['patientBirthDate'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($searchResults) && empty($searchResults)) : ?>
        <p>No patients found.</p>
    <?php endif; ?>
    </div>
    <b><a href="view_patient.php"></b>
</body>
</html>
