<?php
include __DIR__ . '/model/model_team.php';

if (isset($_POST['users'])) {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    $user = login($username, $password);
    var_dump($user);

    if(count($user)>0){
        echo 'HELLO';
        session_start();
        $_SESSION['users']=$username;
        header('Location: view_teams.php');
    }else{
        session_unset(); 
    }

}else{
    $username = '';
    $password = '';
}



?>



<form name="login_form" method="post">
        <h2>Login</h2>
       
        <!--FORM-->
        <div class="wrapper">
            <div class="label">
                <label>Username:</label>
            </div>
            <div>
                <input type="text" name="username" value="<?= $username; ?>" />
            </div>
            <div class="label">
                <label>Password:</label>
            </div>
            <div>
                <input type="password" name="password" value="<?= $password; ?>" />
            </div>

            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="login" value="Login" />
            </div>
           
        </div>

       
    </form>