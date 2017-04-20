<?php

/* ------------------------------
    includes/classes/picture.php
---------------------------------*/

class Picture {
    
    private $id;
    private $legend;
    private $uploadDate;
    private $resolution;
    private $filesize;
    private $uploaderId;

    function __construct($id = 0){
        if($id != 0) {
            $picture = sql("SELECT * FROM picture WHERE id='".$id."'");
            $p = $picture[0];
            $this->id = $p['id'];
            $this->legend = $p['legend'];
            $this->uploadDate = $p['upload_date'];
            $this->resolution = $p['resolution'];
            $this->filesize = $p['filesize'];
            $this->uploaderId = $p['uploader_id'];
        }
    }

    function getId() {
       return $this->id;
    }
    
    function setLegend($legend) {
        $this->legend = $legend;
    }
    
    function getLegend() {
        return $this->legend;
    }
    
    function getUploadDate() {
        return $this->uploadDate;
    }
    
    function getResolution() {
        return $this->resolution;
    }

    function getFilesize(){
        return $this->filesize;
    }
    
    function getUploaderId() {
        return $this->uploaderId;
    }

    function delete() {
        $res1 = sql("DELETE FROM picture WHERE id = '".$this->id."'");
        $res2 = sql("DELETE FROM picture_gallery WHERE id = '".$this->id."'");
        unlink('../photos/'.$this->id.'.jpg');
        if($res1 === TRUE && $res2 === TRUE) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    function push() {
        if(empty($this->id)) {
            // On ajoute la photo
            // déterminer la résolution de l'image
            $img = getimagesize($_FILES['prout_photo']['tmp_name']);
            $resolution = ($img[0] * $img[1])/1000000;
            $filesize = $_FILES['prout_photo']['size'];
            $uploaderId = $_SESSION['id'];
            // INSERT
            $id = sql("
            INSERT INTO picture VALUES(
                NULL,
                '".$this->legend."',
                NOW(),
                '".$resolution."',
                '".$filesize."',
                '".$uploaderId."'
                )");
            // On ajoute la photo dans le dossier 'photos'
            move_uploaded_file($_FILES['prout_photo']['tmp_name'],'../photos/'.$id.'.jpg');
            return $id;
        }
        else {
            // On update la légende de la photo
            $res = sql("UPDATE picture SET legend='".$this->legend."' WHERE id='".$this->id."'");
            return $res;
        }
    }
    
    function form($target = 'pictures.php') {
        
        echo '<div class="cadre"><h2>';
        if(empty($this->id)) {
            echo 'Nouvelle photo';
            $img = '<input type="file" name="prout_photo">';
            
        }
        else {
            echo 'Modifier la photo';
            $img = '<img src="../photos/'.$this->id.'.jpg" style="max-width: 100%;max-height: 300px;">';
        }
        echo '</h2>';
        echo '<form enctype="multipart/form-data" action="'.$target.'" method="post">
            '.$img.'
            <input type="text" name="legend" placeholder="Légende de la photo..." value="'.$this->legend.'" >
            <input type="hidden" name="id" value="'.$this->id.'" >
            <input type="submit" value="Envoyer" >
        </form></div>';
    }
    
    static function listPictures() {
        $res = sql("SELECT id FROM picture");
        
        $list = array();
        foreach($res as $picture) {
            array_push($list, new Picture($picture['id']));
        }
        
        return $list;
    }
}    