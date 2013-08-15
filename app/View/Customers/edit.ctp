<div class="formContainer">
<?php echo $this->Form->create('Customer'); ?>
    <fieldset>
        <legend><?php echo __('Need To Change Your Information?'); ?></legend>
        <?php echo '<p>' . $this->Form->input('firstName', array('div' => false, 'value' => $data['Customer']['firstName'])) . '</p>';
        echo '<p>' . $this->Form->input('lastName', array('div' => false, 'value' => $data['Customer']['lastName'])) . '</p>';
        echo '<p>' . $this->Form->input('email', array('div' => false, 'value' => $data['Customer']['email'])) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false, 'value' => $data['Customer']['zip'])) . '</p>';
        echo '<p>' . $this->Form->input('customerId', array('div' => false, 'value' => $data['Customer']['customerId'])) . '</p>';
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