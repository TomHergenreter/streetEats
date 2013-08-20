
<!--Current Location-->
<div class="mainContentSection">
	<h2>Current Location</h2>
	<?php 
	if (count($locations) >= 1){
		echo '<h3>' . $currentLocation['Location']['streetAddress'] . ', ' . $currentLocation['Location']['zip'] . '</h3>';
		echo '<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-count="none" data-text="'. $data['Vendor']['businessName'] .' will be at ' . $currentLocation['Location']['streetAddress']. ', ' . $currentLocation['Location']['zip'] . ' from now until ' . date('g:i a', strtotime($currentLocation['Location']['to'])) .'" data-hashtags="StreetEats,' . str_replace(' ', '', $data['Vendor']['businessName']) . '" data-lang="en">Tweet</a>';
	}else{
		echo '<h3>No Current Location, enter one now <i class="icon-arrow-down"></i></h3>';	  
	}
	?>
</div>

<!--Recent Locations-->
<div class="secondaryContentSection">
	<h2>Recent Locations</h2>
	<?php
	if (count($locations) >= 1){
		foreach($locations as $location ){ 
		    		echo '<h3>' . $location['Location']['streetAddress'] . '</h3>';
		    		echo '<p class="clearBottom">' . $location['Location']['zip'] . '</p>';
		}
	}else{
		echo '<h3>No Recent Locations</h3>';
	}
	?>  
</div>

<!--Update Location Form-->
<div class="formContainer">
<?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Update Location'); ?></legend>
        <?php echo '<p>' . $this->Form->label('to'); 
        echo $this->Form->time('to', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('streetAddress', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'from', array( 'value' => date('H:i a')));
        echo $this->Form->hidden( 'date', array( 'value' => date('Y-m-d')));
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
        echo $this->Form->hidden( 'locationType', array( 'value' => 1));
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>

<!--Future Locations Form-->
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

