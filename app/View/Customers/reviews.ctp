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
			echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'icon-trash')), array('action' => 'deleteReview', $review['Review']['reviewId']), array('escape' => false));
			echo '<p><a href="https://twitter.com/share" class="twitter-share-button" data-size="medium" data-count="none" data-text="'. $review['Review']['review'] .'" data-hashtags="StreetEats,' . str_replace(' ', '', $review['Review']['businessName']) . '" data-lang="en">Tweet</a></p>';
			echo '</div>';
		}
	}	
	?>
</div>