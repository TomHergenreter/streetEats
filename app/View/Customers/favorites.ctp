<div class = 'mainContentSection'>
<h2> View Favorites </h2>
<?php
if (count($favorites) >= 1){
	foreach($favorites as $favorite){
		echo '<h3>' . $favorite['Vendor']['businessName'] . '</h3>';
		echo '<p>' . $favorite['Vendor']['foodType'] . '</p>';
		echo $this->Html->link(' Remove from Favorites', '/customers/removeFavorites/' . $favorite['Vendor']['vendorId']);
	}
}else{
	echo '<h3>You Have Not Picked Any Favorites Yet. ' . $this->Html->link('Find Some!', '/customers/find/') . '</h3>';
}
?>
</div>