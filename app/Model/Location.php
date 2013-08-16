<?php
class Location extends AppModel {
	public $primaryKey = 'locationId';
	
	public $validate = array(
        'zip' => array(
        	'zipcode' => array(
				'rule' => array('postal', null, 'us'),
				'message' => 'Please Enter A Valid Zip Code'
			),
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Enter A Valid Zip Code'
			)
		),
		'to' => array (
			'format' => array(
				'rule' => 'time',
				'message' => 'Please Enter Times Like This: 3:00PM, 12:00AM, 6:38PM etc'
			),
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Please Enter A Time'
			)
		),
		'date' => array (
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Enter A Date in MM/DD/YYYY format'
			)
		),
    );
    
}