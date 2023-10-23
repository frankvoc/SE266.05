<?php
        include __DIR__ . "/model/model_team.php";
        
        $teams = getTeams();
?>
    
<html lang="en">
<head>
  <title>View NFL Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
     <div class="col-sm-offset-2 col-sm-10">
     
   <h1>NFL Teams</h1>
   <p><a href="addTeam.php">Add Team</a></p>
   <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Team Name</th>
                <th>Division</th>
            </tr>
        </thead>
        <tbody>
         <?php foreach ($teams as $t): ?>
            <tr>
                <td><?= $t['id']; ?></td>
                <td><?= $t['teamName']; ?></td>
                <td><?= $t['division']; ?></td>            
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>