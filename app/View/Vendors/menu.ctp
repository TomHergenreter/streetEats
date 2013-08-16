<div class="formContainer">
<?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php echo __('New Menu Item'); ?></legend>
        <?php echo '<p>' . $this->Form->input('menuItem', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('description', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->input('price', array('div' => false)) . '</p>';
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Submit')) . '</p>';
		echo $this->Form->end();
    ?>
    </fieldset>
</div>

<div class="mainContentSection">
	<h2>Current Menu Items</h2>
	<?php
	if(count($menu) >= 1){
	foreach($menu as $menuItem ){ 
				echo '<div class="subSection">';
	    		echo '<h3>' . $menuItem['Menu']['menuItem'] . '</h3>';
	    		echo '<p>' . $menuItem['Menu']['description'] . '</p>';
	    		echo '<p class="clear">$' . $menuItem['Menu']['price'] . '</p>';
	    		echo $this->form->postLink('Remove', array('action' => 'deleteMenu', $menuItem['Menu']['id']));
	    		echo '</div>';
	}
	}else{
		echo '<h3>No Menu Items Have Been Created Yet</h3>';
	}
	?>    	
</div>