<div class="users form">
<?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Edit Vendor'); ?></legend>
        <?php echo $this->Form->input('businessName', array('value' => $data['Vendor']['businessName']));
        echo $this->Form->input('email', array('value' => $data['Vendor']['email']));
        echo $this->Form->input('zip', array('value' => $data['Vendor']['zip']));
        echo $this->Form->input('imageName', array('value' => $data['Vendor']['imageName']));
        echo $this->Form->input('vendorId', array('value' => $data['Vendor']['vendorId']));
        echo $this->Form->input('vendorId', array('value' => $data['Vendor']['vendorId']));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<?php echo $this->Form->postLink('Delete', '/users/delete'); ?>
</div>