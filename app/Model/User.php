<?php

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	
	public $primaryKey = 'userId';
	
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'Please Enter A Unique Username'
            ),
            'duplicate' => array(
            	'rule' => 'isUnique',
            	'message' => 'That Username Is Already Taken'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A password is required'
            )
        )
	);
    
    public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
	
}

?>