<div class="users form">
<?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Add Vendor'); ?></legend>
        <?php echo $this->Form->input('businessName');
        echo $this->Form->input('email');
        echo $this->Form->input('zip');
        echo $this->Form->input('imageName');
        echo $this->Form->hidden( 'userId', array( 'value' => $userId)); 
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>