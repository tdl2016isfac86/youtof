<?php
if(!isset($_GET['gallery_id'])) {
    header('Location: galleries.php');
}
require_once('../includes/classes/gallery.php');
require_once('../includes/classes/picture.php');
require_once('../includes/db.php');
require_once('../includes/config.php');

$gallery = new Gallery($_GET['gallery_id']);
$nameGallery = $gallery->getName();

$msgBienvenue = 'Sélection pour '.$nameGallery.'<br><button id="btnValidate">Valider</button>';
require_once('header.php');
$list = Picture::listPictures();
?>
<script type="text/javascript">
   $(window).load(function () {
        $('.Collage').collagePlus();



        var selectedImg = [];
        $('img').each(function() {
            var idImg = this.id.substr(1);
            selectedImg[idImg] = false;
        });
        $('img').click(function() {
            var idImg = this.id.substr(1);
            if(selectedImg[idImg]) {
                // Déselection de l'image
                selectedImg[idImg] = false;
                this.style.filter = 'grayscale(0.75)';
                this.style.borderColor = '#777';
                this.style.borderStyle = 'dotted';
            }
            else {
                // Sélection de l'image
                selectedImg[idImg] = true;
                this.style.filter = 'grayscale(0)';
                this.style.borderColor = '#f68e56';
                this.style.borderStyle = 'solid';
            }
        });
        
        $('#btnValidate').click(function() {
            var str = '';
            for(var i in selectedImg) {
                if(selectedImg[i]) {
                    str += i+',';
                }
            }
            str = str.substr(0,str.length-1);
            window.location.href = 'galleries.php?action=addPictures&id=<?php
            echo $_GET['gallery_id'];
            ?>&pictures='+str;
        });
        <?php
        
        $res = sql("SELECT picture_id FROM picture_gallery WHERE gallery_id ='".$gallery->getId()."'");
        $json = json_encode($res);
        // var_dump($json);
        ?>
        var json = <?php echo $json ?>;
        
        for(var i in json) {
            var img = $('#i'+json[i].picture_id);
            
            img.click(); // La fonction .click() de jQuery, utilisée sans paramètre, produit l'action d'un click
    
        }
    });
    
</script>
<div class="Collage">
    
<?php
foreach($list as $p) {
    echo '<img src="../photos/'.$p->getId().'.jpg" id="i'.$p->getId().'">';
}
echo '</div>';






require_once('footer.php');