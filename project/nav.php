	<aside>
		<figure class="user">
			<img src="pony.png" alt="Ponies ! Ponies everywhere !" height="128">
		</figure>
		<nav>
			<ul>
				<li>
					<a href="#">
						<i class="icon-folder"></i> 
						<span class="label">Galeries</span>
					</a>
					<ul>
						<?php
						$list = Gallery::listGalleries();
					
					
						foreach($list as $i) {
							
							if(isset($_GET['gallery']) && $_GET['gallery'] == $i->getId()) {
								echo '<li class="active">';
							}
							else {
								echo '<li>';
							}
							
							echo '<a href="index.php?gallery='.$i->getId().'">'.$i->getName().'</a></li>';
						}
						?>
					</ul>
				</li>
				<li>
					<a href="#">
						<i class="icon-cog"></i>
						<span class="label">Options</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="icon-help"></i> 
						<span class="label">Aide</span>
					</a>
				</li>
			</ul>
		</nav>
	</aside>