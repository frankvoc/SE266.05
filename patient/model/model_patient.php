<?php

    include (__DIR__ . '/db.php');
    
    // Get listing of all teams
    function getPatients () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY patientFirstName"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
        {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }

    //Add a team to database
    function addPateint ($firstName, $lastName, $married, $birthDate) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO patients SET patientFirstName = :firstName, patientLastName = :lastName, patientMarried = :married, patientBirthDate = :birthDate");

        $binds = array(
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":married" => $married,
            ":birthDate" => $birthDate,
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    function deleteTeam ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }

   
    function searchTeams ($team, $division) {
        global $db;
        $binds = array();
    
        $sql =  "SELECT * FROM  teams WHERE 0=0";

        if ($team != "") {
            $sql .= " AND teamName LIKE :team";
            $binds['team'] = '%'.$team.'%';
        }
    
        if ($division != "") {
            $sql .= " AND division LIKE :division";
            $binds['division'] = '%'.$division.'%';
        }
    
        $sql .= " ORDER BY teamName";

        $results = array();

        $stmt = $db->prepare($sql);

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
             
        return ($results);
    }
    function login($user, $pass){
        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM users WHERE username=:user AND password=sha1(:pass)");
        $stmt->bindValue(':username', $user);
        $stmt->bindValue(':pasword', $pass);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }
   
    //   $result = addTeam2 ('Ajax', 'Eredivisie');
    //   echo $result;
    

?>