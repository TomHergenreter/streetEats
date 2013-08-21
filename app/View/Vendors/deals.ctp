<div class="formContainer">
<?php echo $this->Form->create('Deal'); ?>
    <fieldset>
        <legend><?php echo __('New Deal'); ?></legend>
        <?php echo $this->Form->input('dealTitle', array('div' => false, 'before' => '<p>', 'after' => '</p>'));
        echo $this->Form->input('dealDescription', array('div' => false, 'before' => '<p>', 'after' => '</p>'));
        echo '<p>' . $this->Form->label('dealExpiration');
        echo $this->Form->date('dealExpiration', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId'], 'div' => false, 'before' => '<p>', 'after' => '</p>'));
		echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end(); 
	?>
	</fieldset>
</div>

<div class="mainContentSection">
	<h2>Current Deals</h2>
	<?php
	if (count($currentDeals) >=1 ){
		foreach($currentDeals as $deal ): 
					echo '<div class="subSection">';
		    		echo '<h3>' . $deal['Deal']['dealTitle'] . '</h3>';
		    		echo '<p>Description: ' . $deal['Deal']['dealDescription'] . '</p>';
		    		echo '<p class="clear">Expiration: ' . $deal['Deal']['dealExpiration'] . '</p>';
		    		echo '<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-count="none" data-text="'. $deal['Deal']['dealDescription'] .' at ' . $name . '" data-hashtags="StreetEats,' . str_replace(' ', '', $name) . '" data-lang="en">Tweet</a>';
		    		echo '</div>';
		endforeach;
	}else{
		echo '<h3>You Have Not Created Any Deals Yet, Try It Out <i class="icon-arrow-up"></i></h3>';
	}
	?>    	
</div>