<?php

class Vendor extends AppModel {
	public $primaryKey = 'vendorId';
	
	public $validate = array(
        'businessName' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter Your Business Name'
            ),
        ),
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
	);
	
}
