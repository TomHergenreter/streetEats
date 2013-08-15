<div class='mainContentSection'>
	<h2> Reviews </h2>
	<?php 
	if(count($data) >= 1){
		foreach($data as $review){
			echo '<div class="subSection">';
			echo '<h3>Reviewed By ' . $review['Review']['customerName'] . '</h3>';
			echo '<h3>Rating: ' .$review['Review']['rating'] . '</h3>';
			echo '<h3><i class="icon-quote-left icon-muted"></i>' .$review['Review']['review'] . '<i class="icon-quote-right icon-muted"></i></h3>';
			echo '</div>';
		}
	}else{
		echo '<h3>No Reviews Have Been Created</h3>';	
	};
	?>
</div>
