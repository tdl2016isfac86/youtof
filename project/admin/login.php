<?php

require_once('../includes/config.php');
require_once('../includes/db.php');

require_once('../includes/classes/user.php');

session_start();

if(isset($_POST['email']))
{
    $res= User::checkCredentials($_POST['email'],$_POST['password']);
    if($res === FALSE) {
        $msg = 'Email et mot de passe entrés sont invalides';
    }
    else {
        $_SESSION['id'] = $res->getId();
        header('Location: index.php');
    }
}
else{
    $msg = '';
}
?><!DOCTYPE html>
<html>
    <head>
        <title>Login form</title>
        <link rel="stylesheet" href="styles/style.css" type="text/css" />
    </head>
    <body><?php echo $msg;
    ?>
        <form action="login.php" method="post">
            <input type="text" name="email" placeholder="Votre Email"/>
            <input type="password" name="password" placeholder="Votre Password"/>
            <input type="submit" value="Valider">
        </form>
        
        <a href="forgotpassword.php">Mot de passe oublié?</a>
        
    </body>
</html>
