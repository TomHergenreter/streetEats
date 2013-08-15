<div class="formContainer">
<?php echo $this->Form->create('Review'); ?>
    <fieldset>
        <legend><?php echo __('What Did You Think?'); ?></legend>
        <?php 
        echo '<p>' . $this->Form->input('rating', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('review', array('div' => false)) . '</p>';
        echo $this->Form->hidden('customerId', array('value' => $customerId['Customer']['customerId']));
        echo $this->Form->hidden('vendorId', array('value' => $vendorId));
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
		?>
    </fieldset>
</div>