<?php
$msgBienvenue = "Photos";
require_once('header.php');

// Si c'est une nouvelle photo, on l'ajoute
if(isset($_FILES['prout_photo']) && $_FILES['prout_photo']['error'] == 0) {
    $p = new Picture();
    $p->setLegend($_POST['legend']);
    $p->push();
}
// Si c'est une photo déjà en bdd, on met à jour sa légende
if(isset($_POST['id']) && !empty($_POST['id'])) {
    $p = new Picture($_POST['id']);
    $p->setLegend($_POST['legend']);
    $p->push();
}


// afficher le formulaire pour ajouter une photo

if(isset($_GET['action']) && $_GET['action'] == 'edit') {
    $p = new Picture($_GET['id']);
    $p->form(); 
}
else {
    $p = new Picture();
    $p->form(); 
}
if(isset($_GET['action']) && $_GET['action']=='delete') {
    $p = new Picture($_GET['id']);
    $ret = $p->delete();
    if($ret) {
        echo 'L\'image a bien été supprimée';
    }
    else {
        echo 'Problème lors de la suppression de l\'image';
    }
}
//------------------------------------------------------

//afficher les photos et les modifier
echo'<div class="cadre">';
$list = Picture::listPictures();

foreach($list as $i) {
     	echo '<li class="li_liste">
	    
    	<div class="div_delete">
    	    
    	    <a href="pictures.php?action=edit&id='.$i->getId().'">
            	<span class="fa fa-pencil"></span>
            </a>
            <a href="pictures.php?action=delete&id='.$i->getId().'">
            	<span class="fa fa-trash"></span>
        	</a>
         </div>
        	<div class="div_liste"><img src="../photos/'.$i->getId().'.jpg" height="50"></div>
	</li>';
}
echo'</div>';
//--------------------------------------------------


require_once('footer.php');
