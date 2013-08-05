<?php
class CustomersController extends AppController {

	public function add() {
	
		$userId = $this->Auth->user('userId');
		$this->set('userId', $userId);
		
		if ($this->request->is('post')) {
			
			$currentUserIds = $this->Customer->find('all', array('fields' => array('Customer.userId')));	
	    	foreach($currentUserIds as $user ): 
	    		if($this->request->data['Customer']['userId'] == $user['Customer']['userId']){
	        		$this->Session->setFlash(__('You have already created a profile'));
	        		return false;
	    		}	
	    	endforeach;
			
            $this->Customer->create();
            if ($this->Customer->save($this->request->data)) {
            	$this->redirect(array('controller' => 'customers', 'action' => 'success'));
            } else {
	            echo ('error');
            }
        }
	}
	
	public function success() {
		
	}

}

