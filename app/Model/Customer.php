<?php

class Customer extends AppModel {
	public $primaryKey = 'customerId';
	
	public $validate = array(
        'firstName' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter Your First Name'
            ),
            'letters' => array(
            	'rule' => 'alphanumeric',
            	'message' => 'Only Letters Are Allowed'
            )
        ),
        'lastName' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter Your Last Name'
            ),
            'letters' => array(
            	'rule' => 'alphanumeric',
            	'message' => 'Only Letters Are Allowed'
            )
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
