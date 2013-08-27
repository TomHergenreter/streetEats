<div class = 'mainContentSection'>
<h2> View Favorites </h2>
<?php
if (count($favorites) >= 1){
	foreach($favorites as $favorite){
		echo '<div class="subSection">';
		echo '<h3>' . $this->Html->link($favorite['Vendor']['businessName'], '/customers/menus/' . $favorite['Vendor']['vendorId']) . '</h3>';
		echo '<p>' . $favorite['Vendor']['foodType'] . '</p>';
		echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-remove-sign')), '/customers/removeFavorites/' . $favorite['Vendor']['vendorId'],  array('escape' => false));
		echo $this->Html->link($this->Html->tag('i', '', array('class' => 'icon-comment')), '/customers/addReview/' . $favorite['Vendor']['vendorId'],array('escape' => false));
		echo '</div>';
	}
}else{
	echo '<h3>You Have Not Picked Any Favorites Yet. ' . $this->Html->link('Find Some!', '/customers/find/') . '</h3>';
}
?>
</div>




