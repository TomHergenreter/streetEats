<div class='formContainer'>
<?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Update Your Information'); ?></legend>
        <?php echo '<p>' . $this->Form->input('businessName', array('div' => false, 'value' => $data['Vendor']['businessName'])) . '</p>';
        echo '<p>' . $this->Form->input('foodType', array('div' => false, 'value' => $data['Vendor']['foodType'])) . '</p>';
        echo '<p>' . $this->Form->input('email', array('div' => false, 'value' => $data['Vendor']['email'])) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false, 'value' => $data['Vendor']['zip'])) . '</p>';
        echo '<p>' . $this->Form->input('vendorId', array('div' => false, 'value' => $data['Vendor']['vendorId'])) . '</p>';
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>

<div class='mainContentSection'>
	<h2>Delete Your Account</h2>
	<p class='clear'>Don't Click...unless you really want to</p> 
	<?php echo $this->Form->postLink('Delete', '/users/delete'); ?>
</div>