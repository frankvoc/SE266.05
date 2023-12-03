<?php

    include (__DIR__ . '/db.php');
    
    //Get listing of all teams
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

        $results = array(
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":married" => $married,
            ":birthDate" => $birthDate,
        );
        
        
        if ($stmt->execute($results) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    function updatePatient ($id, $firstName, $lastName, $married, $birthDate) {
        global $db;

        $results = "";
        $sql = "UPDATE patients SET patientFirstName = :firstName, patientLastName = :lastName, patientMarried = :married, patientBirthDate = :birthDate WHERE id=:id ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':firstName', $firstName);
        $stmt->bindValue(':lastName', $lastName);
        $stmt->bindValue(':married', $married);
        $stmt->bindValue(':birthDate', $birthDate);
      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }
    function deletePatient ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }
    function getPatient($id){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM patients WHERE id=:id");
        $stmt->bindValue(':id', $id);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }
    function searchPatients($firstName, $lastName, $marriedStatus) {
        global $db;
    
        $sql = "SELECT * FROM patients WHERE 1=1";
    
        $results = [];
    
        if (!empty($firstName)) {
            $sql .= " AND patientFirstName LIKE :firstName";//building the query as we go
            $results['firstName'] = '%' . $firstName . '%';//'%' = :LIKE
        }
        if (!empty($lastName)) {
            $sql .= " AND patientLastName LIKE :lastName";
            $results['lastName'] = '%' . $lastName . '%';
        }
        if ($marriedStatus !== '') {
            $sql .= " AND patientMarried = :marriedStatus";
            $results['marriedStatus'] = $marriedStatus;
        }
        $stmt = $db->prepare($sql);//our sql statment query is now finished. It was dynamically built above
        if ($stmt->execute($results) && $stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }
  
    function login($user, $pass){//not functional.
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