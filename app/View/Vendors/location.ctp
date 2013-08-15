<div class="formContainer">
<?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Current Location'); ?></legend>
        <?php echo '<p>' . $this->Form->label('to'); 
        echo $this->Form->time('to', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('streetAddress', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'date', array( 'value' => date('Y-m-d')));
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
        echo $this->Form->hidden( 'locationType', array( 'value' => 1));
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>

<div class="secondaryContentSection">
	<h2>Recent Locations</h2>
	<?php
	if (count($locations) > 1){
		foreach($locations as $location ){ 
		    		echo '<h3>' . $location['Location']['streetAddress'] . '</h3>';
		    		echo '<p class="clearBottom">' . $location['Location']['zip'] . '</p>';
		}
	}else{
		echo '<h3>No Recent Locations</h3>';
	}
	?>  
</div>

<div class="formContainer">
<?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Future Location'); ?></legend>
        <?php echo '<p>' . $this->Form->label('Date'); 
        echo $this->Form->date('date', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->label('from'); 
        echo $this->Form->time('from', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->label('to'); 
        echo $this->Form->time('to', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('streetAddress', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'vendorId', array('value' => $data['Vendor']['vendorId']));
        echo $this->Form->hidden( 'locationType', array( 'value' => 2));
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>

