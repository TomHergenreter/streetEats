<div class="users form">
<?php echo $this->Form->create('Menu'); ?>
    <fieldset>
        <legend><?php echo __('New Menu Item'); ?></legend>
        <?php echo $this->Form->input('menuItem');
        echo $this->Form->input('description');
        echo $this->Form->input('price');
        echo $this->Form->hidden( 'vendorId', array( 'value' => $data['Vendor']['vendorId']));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="users form">
	<h2>Current Menu Item</h2>
	<?php
	foreach($menu as $menuItem ): 
	    		echo '<h1>' . $menuItem['Menu']['menuItem'] . '</h2><p>' . $menuItem['Menu']['description'] . '</p>' . $this->form->postLink('delete', array('action' => 'deleteMenu', $menuItem['Menu']['id']));
	endforeach;
	?>    	
</div>