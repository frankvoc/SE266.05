<?php

    include (__DIR__ . '/db.php');
    
    // Get listing of all teams
    function getTeams () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT id, teamName, division FROM teams ORDER BY teamname"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) 
        {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }

    //Add a team to database
    function addTeam ($team, $division) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        $binds = array(
            ":team" => $team,
            ":division" => $division
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
   
    // Alternative style to add team records database.
    function addTeam2 ($team, $division) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");
       
        $stmt->bindValue(':team', $team);
        $stmt->bindValue(':division', $division);
       
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
       
        $stmt->closeCursor();
       
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