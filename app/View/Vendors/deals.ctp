<div class="users form">
<?php echo $this->Form->create('Deal'); ?>
    <fieldset>
        <legend><?php echo __('New Deal'); ?></legend>
        <?php echo $this->Form->input('dealTitle');
        echo $this->Form->input('dealDescription');
        echo $this->Form->input('dealExpiration');
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
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