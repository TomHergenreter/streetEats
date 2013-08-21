
<div class="login">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo '<p>' . $this->Form->input('username', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('password', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('userType', array('div' => false, 'options' => array('1' => 'Customer', '2' => 'Vendor'))) . '</p>';
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>