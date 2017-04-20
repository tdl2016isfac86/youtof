<?php
require_once('header.php');

// Liste des galeries

echo '<div class="cadre">
        <a href="galleries.php"><h3>Ajouter une nouvelle galerie</h3>
        </a>
    </div>';

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
         </div>
        	<div class="div_liste">'.$list->getName().'</div>
	</li>';
    
}
echo '</ul></div></section>';





require_once('footer.php');

