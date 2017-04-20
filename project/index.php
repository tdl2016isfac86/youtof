<?php

include('header.php');
?>

	<section class="content">
		<div class="galerie Collage effect-parent">

<?php
if(isset($_GET['gallery'])){
    $g = new Gallery($_GET['gallery']);
    $list = $g->getPictures();
    foreach($list as $p) {
    	if($p->getLegend() != '') {
    	echo '<div class="Image_Wrapper" data-caption="'.$p->getLegend().'">';
    	}
		echo '<a href="photos/'.$p->getId().'.jpg">
					<img src="photos/'.$p->getId().'.jpg" alt="'.$p->getLegend().'">
				</a>';
		// if(!empty($p->getLegend())) {
		// 	echo'<div class="effect-parent">'.$p->getLegend().'</div>';
		// }
    	if($p->getLegend() != '') {
				echo '</div>';
    	}
    }
    
}
?>

		</div>
	</section>



<?php
include('footer.php');
