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

<div class="users form">
	<h2>Current Deals</h2>
	<?php
	foreach($currentDeals as $deal ): 
	    		echo '<h3>Deal: ' . $deal['Deal']['dealTitle'] . '</h3>';
	    		echo '<p>Description: ' . $deal['Deal']['dealDescription'] . '</p>';
	    		echo '<p>Expiration: ' . $deal['Deal']['dealExpiration'] . '</p>';
	endforeach;
	?>    	
</div>