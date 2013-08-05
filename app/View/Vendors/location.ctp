<div class="users form">
<?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Current Location'); ?></legend>
        <?php echo $this->Form->input('to');
        echo $this->Form->input('streetAddress');
        echo $this->Form->input('zip');
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
        echo $this->Form->hidden( 'locationType', array( 'value' => 1));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="users form">
<?php echo $this->Form->create('Location'); ?>
    <fieldset>
        <legend><?php echo __('Future Location'); ?></legend>
        <?php echo $this->Form->input('date', array('empty' => array('day' => 'DAY', 'month' => 'MONTH', 'year' => 'YEAR'))); 
        echo $this->Form->input('time');
        echo $this->Form->input('streetAddress');
        echo $this->Form->input('zip');
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
        echo $this->Form->hidden( 'locationType', array( 'value' => 2));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>