<div class='mainContentSection'>
	<h2> My Reviews </h2>
	<?php
	if(count($data) < 1){
		echo '<h3>You Have Not Created Any Reviews Yet</h3>';
	}else{
		foreach($data as $review){
			echo '<div class="subSection">';
			echo '<h3>' . $review['Review']['businessName'] . '</h3>';
			echo '<p>Rating: ' . $review['Review']['rating'] . '</p>';
			echo '<p><i class="icon-quote-left icon-muted"></i>' . $review['Review']['review'] . '<i class="icon-quote-right icon-muted"></i></p>';
			echo $this->form->postLink('delete', array('action' => 'deleteReview', $review['Review']['reviewId']));
			echo '</div>';
		}
	}	
	?>
</div>