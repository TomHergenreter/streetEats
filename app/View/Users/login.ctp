<div class="background">
	<div class="login">
	<?php echo $this->Form->create('User'); ?>
	    <fieldset>
	        <legend><?php echo __('Login'); ?></legend>
	        <?php echo '<p>' . $this->Form->input('username',array('div' => false)) . '</p>';
	        echo '<p>' . $this->Form->input('password',array('div' => false)) . '</p>';
	        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
			echo $this->Form->end();
	    ?>
	    </fieldset>
	</div>
</div>