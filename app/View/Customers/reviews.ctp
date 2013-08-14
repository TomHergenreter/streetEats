<div class='user form'>
	<h2> My Reviews </h2>
	<?php
	if(count($data) < 1){
		echo '<h3>You Have Not Created Any Reviews Yet</h3>';
	}else{
		foreach($data as $review){
			echo '<h3>' . $review['Review']['businessName'] . '</h3>';
			echo '<p>Rating: ' . $review['Review']['rating'] . '</p>';
			echo '<p>Review: ' . $review['Review']['review'] . '</p>';
			echo $this->form->postLink('delete', array('action' => 'deleteReview', $review['Review']['reviewId']));
		}
	}	
	?>
</div>