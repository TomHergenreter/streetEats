<?php $this->Html->script('http://maps.google.com/maps/api/js?key=AIzaSyA9Ey6xqdSNYFmWoZyuWbLnruau5VAFN3k&sensor=true', false); ?>
<?php 
$mapOptions = array('zoom' => 11, 'type' => 'ROADMAP', 'width' => '600px', 'height' => '400px','markerIcon' => 'marker.png' , 'custom' => 'styles : [
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
$marker_options = array(
    'showWindow' => true,
    'windowText' => 'Marker',
    'markerTitle' => 'Title',
    'markerIcon' => 'truck.png',
  );
echo '<h2>Nearby Trucks</h2>';  
echo $this->GoogleMap->map($mapOptions);
foreach($matches as $match){
	echo $this->GoogleMap->addMarker('map_canvas', '1', $match['Location']['streetAddress'] . '' . $match['Location']['zip'], $marker_options);
};
 
?>

<?php echo $this->Form->create('Vendor'); ?>
    <fieldset>
        <legend><?php echo __('Find Trucks'); ?></legend>
        <?php 
        echo $this->Form->input('search');
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Search')); ?>
<?php
if($results != ' '){
if (count($results) < 1){
	echo '<h2>No Results</h2>';
}else{ 
	foreach ($results as $result){
		echo '<h2>' . $result[0]['Vendor']['businessName'] . '</h2>';
		echo '<p>' . $result[0]['Vendor']['foodType'] . '</p>';
		echo $this->Html->link('Menu', '/customers/menus/' . $result[0]['Vendor']['vendorId']);
	}
}
}
?>
