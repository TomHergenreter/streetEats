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
	echo '<h2>Recent Reviews</h2>';
	if (count($reviews) >= 1){
	foreach ($reviews as $review){
			echo '<div class="subSection">';
			echo '</div>';
		}
	}else{
		echo '<div class="subSection">';
		echo '<h3>This Vendor Has Not Received Any Reviews Yet. ' . $this->Html->link('Be The First!', 'addReview/' . $vendorId) . '</h3>';
		echo '</div>';
	}
	echo $this->Html->link('back', 'find');	
	?>
</div>