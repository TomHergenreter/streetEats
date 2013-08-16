

<div class="formContainer">
<?php echo $this->Form->create('Customer'); ?>
    <fieldset>
        <legend><?php echo __('Add Customer'); ?></legend>
        <?php echo '<p>' . $this->Form->input('firstName', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('lastName', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('email', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'userId', array( 'value' => $userId));
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end(); 
    ?>
    </fieldset>
</div>