<?php

class Deal extends AppModel {
	public $primaryKey = 'reviewId';
	
	public $validate = array(
        'dealTitle' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Complete All Fields'
            )
        ),
        'dealDescription' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Complete All Fields'
            )
        ),
        'dealExpiration' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Complete All Fields'
            )
        )
	);
	
}
