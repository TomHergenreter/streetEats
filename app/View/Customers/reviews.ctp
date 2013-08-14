<div class='user form'>
	<h2> My Reviews </h2>
	<?php
	foreach($data as $review){
		echo '<h3>' . $review['Review']['businessName'] . '</h3>';
		echo '<p>Rating: ' . $review['Review']['rating'] . '</p>';
		echo '<p>Review: ' . $review['Review']['review'] . '</p>';
	}	
	?>
</div>