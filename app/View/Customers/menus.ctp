<div class='mainContentSection'>
	<?php 
	echo '<h2>' . $vendor . '</h2>'; 
	foreach ($menuItems as $menuItem){
		echo '<div class="subSection">';
		echo '<h3>' . $menuItem['Menu']['menuItem'] . '</h3>';
		echo '<p>' . $menuItem['Menu']['description'] . '</p>';
		echo '<p>$' . $menuItem['Menu']['price'] . '</p>';	
		echo '</div>';
	}
	echo $this->Html->link('back', 'find');	
	?>
</div>