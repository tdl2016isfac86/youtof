<?php

/* ------------------------------
    includes/classes/gallery.php
---------------------------------*/

class Gallery {
    
    private $id;
    private $name;
    private $pictures;
    
    function __construct($id = 0) {
        if($id != 0) {
            $gallery = sql("SELECT * FROM gallery WHERE id='".$id."'");
            // sql utiliser ->fetch_all() qui fournit un tableau de tableaux contenant les résultats
            // On obtient le premier résultat avec l'index 0 de $gallery
            $g = $gallery[0];
            // $g contient les index des noms des colones de la table gallery
            // Soit id et name
            
            $this->id = $g['id'];
            $this->name = $g['name'];
            
            $this->pictures = array();
            
            $listPictures = sql("SELECT picture_id FROM picture_gallery WHERE gallery_id='".$id."'");
            foreach($listPictures as $p) {
                array_push($this->pictures, new Picture($p['picture_id']));
            }
        }
    }
    
    function getId() {
        return $this->id;
    }
    
    function getName() {
        return $this->name;
    }
    
    function setName($name) { 
        $this->name = $name;
    }
    
    function getPictures() {
        return $this->pictures;
    }
    
    function push() {
        if(empty($this->id)){
        $res = sql("
        INSERT INTO gallery VALUES (NULL, '".$this->name."');
        ");
        }
        else {
        $res = sql("UPDATE gallery SET name='".$this->name."' WHERE id='".$this->id."'");
        }
    }
    
    function delete() {
        $res = sql("DELETE FROM gallery WHERE id = '".$this->id."'");
        return $res;
    }
    
    static function listGalleries() {
        $res = sql("SELECT id FROM gallery");
        
        $list = array();
        foreach($res as $gallery) {
            array_push($list, new Gallery($gallery['id']));
        }
        
        return $list;
    }
    
    
    
    function form($target = 'galleries.php') {
        echo '<section class="cadre">';
        echo '<h2>';
        if(empty($this->id)) {
            echo 'Nouvelle galerie';
        }
        else {
            echo 'Modifier la galerie';
        }
        echo '</h2>';
        echo '<form method="post" action="'.$target.'">
            <input type="text" name="name" value="'.$this->name.'" placeholder="Nom de galerie" />
            <input type="hidden" name="id" value="'.$this->id.'" />
            <input type="submit" value="Envoyer" />
            </form>';
        if(!empty($this->id)) {
            echo '<a href="pictures_association.php?gallery_id='.$this->id.'">Associer des photos à cette galerie</a>';
        }
        echo '</section>';
    }
    
}