<?php

class Review extends AppModel {
	public $primaryKey = 'reviewId';
	
	public $validate = array(
        'rating' => array(
            'range' => array(
                'rule' => array('range', 0, 6),
                'message' => 'Choose A Rating Between 0 and 5'
            )
        )
	);
	
}
