<div class='user form'>
	<h2> Reviews </h2>
	<?php echo '<h3>Reviewed by: ' . $customer['Customer']['firstName'] . '</h3>';
		  echo '<h3>Rating: ' .$data[0]['Review']['rating'] . '</h3>';
		  echo '<h3>Comment: ' .$data[0]['Review']['review'] . '</h3><!--REMOVE--></hr?';
	?>
</div>