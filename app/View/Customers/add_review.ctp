<div class="users form">
<?php echo $this->Form->create('Review'); ?>
    <fieldset>
        <legend><?php echo __('What Did You Think?'); ?></legend>
        <?php 
        echo $this->Form->input('rating');
        echo $this->Form->input('review');
        echo $this->Form->hidden('customerId', array('value' => $customerId['Customer']['customerId']));
        echo $this->Form->hidden('vendorId', array('value' => $vendorId));
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>