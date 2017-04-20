<?php
$msgBienvenue = "Galeries";
require_once("header.php");



if(isset($_POST['name'])) {
    if($_POST['id'] == '') {
        // L'id est vide, on fait un insert
        $g = new Gallery();
    }
    else {
        // On connait l'id, on met à jour la galerie dans la table (UPDATE)
        $g = new Gallery($_POST['id']);
    }
    $g->setName($_POST['name']);
    $g->push();
}

if(isset($_GET['action']) && $_GET['action']=='edit') {
    $g = new Gallery($_GET['id']);
    $g->form();
}
else {
    $g = new Gallery();
    $g->form();
}
if(isset($_GET['action'])) {
    if($_GET['action']=='delete') {
        echo '<section class="cadre">';
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'oui') {
            $g = new Gallery($_GET['id']);
            $ret = $g->delete();
            if($ret) {
                echo 'La galerie '.$g->getName().' a bien été supprimée';
            }
            else {
                echo 'Problème lors de la suppression de la galerie';
            }
        }
        else {
            $g = new Gallery($_GET['id']);
            $nom = $g->getName();
            echo 'Êtes-vous sur de vouloir supp la galerie '.$nom.' ?<br>'
            .'<a href="galleries.php?confirm=oui&action=delete&id='.$_GET['id'].'">Oui</a>'
            .' ::: <a href="javascript:history.back()">Non</a>';
        }
    echo '</section>';    
    }
    elseif($_GET['action'] == 'addPictures') {
        $pictures = explode(',',$_GET['pictures']);
        $g = $_GET['id'];
        
        $reset = sql("DELETE FROM picture_gallery WHERE gallery_id='".$g."'");
        $request = 'INSERT INTO picture_gallery VALUES';
        foreach($pictures as $k => $p) {
            $request .= '('.$p.','.$g.')';
            if($k+1 != count($pictures)) {
                $request .= ',';
            }
        }
        sql($request);
        echo 'Photos dûment associées';
    }
}


// Liste des galeries
$res = Gallery::listGalleries();

echo '<section class="liste">
<div class="cadre">
	<h2 class="inlineblock">Liste des galeries</h2>
	<br>
<ul>';
foreach($res as $list) {
	echo '<li class="li_liste">
	    
    	<div class="div_delete">
    	    <a href="pictures_association.php?gallery_id='.$list->getId().'">
        	    <span class="fa fa-plus-square"></span>
        	</a>
        	<a href="galleries.php?action=edit&id='.$list->getId().'">
            	<span class="fa fa-pencil"></span>
            </a>
            <a href="galleries.php?action=delete&id='.$list->getId().'">
            	<span class="fa fa-trash"></span>
        	</a>
<!--            <a href="javascript:deleteConfirm('.$list->getId().')">
            	<span class="fa fa-trash"></span>
        	</a>-->
         </div>
        	<div class="div_liste">'.$list->getName().'</div>
	</li>';
    
}
echo '</ul></div></section>';

    




require_once("footer.php");