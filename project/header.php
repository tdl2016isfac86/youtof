<?php

// include les fichiers de classes et de fonctions
require_once('includes/config.php');
require_once('includes/db.php');

$folder = scandir('includes/classes');
foreach($folder as $file) {
    //if($file != '.' && $file != '..') {
    if(is_file('includes/classes/'.$file)) {
        require_once('includes/classes/'.$file);
    }
}


?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Youtof</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="styles/icon-font.css">
	<link rel="stylesheet" href="styles/style.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/app.js"></script>
	<script type="text/javascript" src="js/collagePlus/jquery.collagePlus.min.js"></script>
	<script src="js/collagePlus/extras/jquery.collageCaption.js"></script>
	<script src="js/collagePlus/extras/jquery.removeWhitespace.js"></script>
</head>

<body>
	<header>
		<a href="#" class="toggle-menu-mobile">
			<i class="icon-folder"></i>
			<span class="label">MENU</span>
		</a>
		<h1>mes-photos <i class="icon-picture"></i> vacances.com</h1>
	</header>
<?php
include('nav.php');
?>