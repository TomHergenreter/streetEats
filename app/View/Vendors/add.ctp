<script type="text/javascript" charset="utf-8">
	window.onload = function() {
	    var d = new Date();
		var timezone = d.getTimezoneOffset();
		console.log(timezone);
		document.getElementById("VendorTimezone").value = timezone;
	}
</script>

<div class="formContainer">
<?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Add Vendor'); ?></legend>
        <?php echo '<p>' . $this->Form->input('businessName', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('email', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('zip', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'userId', array( 'value' => $userId));
        echo $this->Form->hidden( 'timezone');
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>