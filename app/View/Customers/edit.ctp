<div class="users form">
<?php echo $this->Form->create('Customer'); ?>
    <fieldset>
        <legend><?php echo __('Edit Customer'); ?></legend>
        <?php echo $this->Form->input('firstName', array('value' => $data['Customer']['firstName']));
        echo $this->Form->input('lastName', array('value' => $data['Customer']['lastName']));
        echo $this->Form->input('email', array('value' => $data['Customer']['email']));
        echo $this->Form->input('zip', array('value' => $data['Customer']['zip']));
        echo $this->Form->input('imageName', array('value' => $data['Customer']['imageName']));
        echo $this->Form->input('customerId', array('value' => $data['Customer']['customerId']));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<?php echo $this->Form->postLink('Delete', '/users/delete'); ?>
</div>