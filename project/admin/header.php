<?php

require_once('../includes/config.php');
require_once('../includes/db.php');

$folder = scandir('../includes/classes');
foreach($folder as $file) {
    //if($file != '.' && $file != '..') {
    if(is_file('../includes/classes/'.$file)) {
        require_once('../includes/classes/'.$file);
    }
}

session_start();

if(!isset($_SESSION['id'])) {
    header('Location: login.php');
}

?><!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/fontawesome/css/font-awesome.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/collagePlus/jquery.collagePlus.min.js"></script>	
	<script type="text/javascript" src="js/script_admin.js"></script>
</head>
<body>
    <h1 class="Bienvenue"><?php
    if(isset($msgBienvenue)) {
        echo $msgBienvenue;
    }
    else {
        echo 'Joyeux Naël';
  
    }
    
    ?></h1>
<?php
include('nav.php');
?>
<section class= "truc">
    
