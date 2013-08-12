<div class = 'users form'>
<h2> View Favorites </h2>
<?php
foreach($favorites as $favorite){
	echo '<h3>' . $favorite['Vendor']['businessName'] . '</h3>';
	echo '<p>' . $favorite['Vendor']['foodType'] . '</p>';
}
?>
</div>