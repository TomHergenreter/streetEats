<div class='users form'>
	<?php 
	echo '<h2>' . $vendor . '</h2>'; 
	foreach ($menuItems as $menuItem){
		echo '<h3>' . $menuItem['Menu']['menuItem'] . '</h3>';
		echo '<p>' . $menuItem['Menu']['description'] . '</p>';
		echo '<p>$' . $menuItem['Menu']['price'] . '</p>';	
	}
	echo $this->Html->link('back', 'find');	
	?>
</div>