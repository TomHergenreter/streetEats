<?php $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyA9Ey6xqdSNYFmWoZyuWbLnruau5VAFN3k&sensor=true', false); ?>
<div class='mapSection'>
	<?php
	$mapOptions = array('zoom' => 14, 'type' => 'ROADMAP', 'width' => '1200px', 'height' => '400px', 'style' => 'max-width: 100%;', 'markerIcon' => 'marker.png' , 'custom' => 'mapTypeControl:false, panControl:false, styles : [
	    {
	      elementType: "geometry.stroke",
	      stylers: [
	        { visibility: "off" }
	      ]
	    },{
	      featureType: "poi.park",
	      elementType: "labels",
	      stylers: [
	        { visibility: "simplified" }
	      ]
		},{
	      elementType: "geometry.fill",
	      stylers: [
	        { hue: "#ff6e00" }
	      ]
	    },{
	      elementType: "labels.text.stroke",
	      stylers: [
	        { visibility: "off" }
	      ]
	    },{
	      featureType: "poi.park",
	      elementType: "labels.icon",
	      stylers: [
	        { saturation: 100 },
	        { hue: "#ff8800" }
	      ]
		},{
	    }
	  ]');
	echo '<h2>Nearby Trucks</h3>';    
	echo $this->GoogleMap->map($mapOptions);
	$i = 1;
	foreach($matches as $match){
		$id = $match['Location']['vendorId'];
		$name = $match['Location']['businessName'];
		$marker_options = array(
		    'showWindow' => true,
		    'windowText' => $this->html->link($name, 'menus/' . $id),
		    'markerTitle' => $name,
		    'markerIcon' => 'markers/marker' . $i . '.png',
		);
		echo $this->GoogleMap->addMarker('map_canvas', '1', $match['Location']['streetAddress'] . '' . $match['Location']['zip'], $marker_options);
		echo '<div class="locationSection">';
		echo $this->Html->image('markers/marker' . $i . '.png', array('alt' => 'marker' . $i, 'class' => "marker")); 
		echo '<h3>' . $this->Html->link($name, 'menus/' . $id) . '</h3>';
		echo '</div>';
		$i++;
	};
	?>
</div>

<div class='formContainer'>
<?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Find Trucks'); ?></legend>
        <?php 
        echo '<p>' . $this->Form->input('search', array('div' => false)) . '</p>';
        echo '<p>' . $this->Form->button('Submit', array('class' => 'orangeButton large', 'title' => 'Search')) . '</p>';
		echo $this->Form->end();
        ?>
    </fieldset>
</div>
<div class="mainContentSection">
<h2>Results</h2>    
<?php
if($results != ' '){
	if (count($results) < 1){
		echo '<h3>No Results</h3>';
	}else{ 
		foreach ($results as $result){
			echo '<div class="subSection">';
			echo '<h3>' . $result[0]['Vendor']['businessName'] . '</h3>';
			echo '<p>' . $result[0]['Vendor']['foodType'] . '</p>';
			echo '<p>' . $this->Html->link('Menu -', '/customers/menus/' . $result[0]['Vendor']['vendorId']);
			echo $this->Html->link(' Add to Favorites -', '/customers/addFavorites/' . $result[0]['Vendor']['vendorId']);
			echo $this->Html->link(' Write Review', '/customers/addReview/' . $result[0]['Vendor']['vendorId']) . '</p>';
			echo '</div>';
		}
	}
}
?>
</div>