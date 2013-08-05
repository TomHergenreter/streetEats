<?php
class VendorsController extends AppController {
	
	var $uses = array('Vendor', 'Location', 'Menu', 'Review');
	
	//Add Vendor Data
	public function add() {
	
		$userId = $this->Auth->user('userId');
		$this->set('userId', $userId);
		
		if ($this->request->is('post')) {
			
			$currentUserIds = $this->Vendor->find('all', array('fields' => array('Vendor.userId')));	
	    	foreach($currentUserIds as $user ): 
	    		if($this->request->data['Vendor']['userId'] == $user['Vendor']['userId']){
	        		$this->Session->setFlash(__('You have already created a profile'));
	        		return false;
	    		}	
	    	endforeach;
			
            $this->Vendor->create();
            if ($this->Vendor->save($this->request->data)) {
            	$this->render('/vendors/success');
            } else {
	            echo ('error');
            }
        }
	}
	
	//Edit Vendor Data
	public function edit($id = NULL) {
		$userId = $this->Auth->user('userId');
	
        $vendorValue = $this->Vendor->find('first', array('fields' => array('vendorId','businessName', 'email', 'zip', 'imageName', 'userId'),'conditions' => array('Vendor.userId' => $userId)));
		
		$this->set('data', $vendorValue);
		
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Vendor->save($this->request->data)) {
                $this->Session->setFlash(__('Your information has been updated'));
                $this->render('/vendors/success');
                //$this->redirect(array('action' => 'success'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Vendor->read(null, $id);
        }
    }
    
    //Location Settings
    public function location(){
	    
	    $userId = $this->Auth->user('userId');
	    $vendorId = $this->Vendor->find('first', array('fields' => 'vendorId', 'conditions' => array('Vendor.userId' => $userId)));
		$this->set('data', $vendorId);
		
		if ($this->request->is('post')) {
					
            $this->Location->create();
            if ($this->Location->save($this->request->data)) {
            	$this->Session->setFlash(__('Location Saved'));
            	$this->render('/vendors/success');
            } else {
	            echo ('error');
            }
        }	    
    }
    
    //Menu
    public function menu(){
	    
	    $userId = $this->Auth->user('userId');
	    $vendorId = $this->Vendor->find('first', array('fields' => 'vendorId', 'conditions' => array('Vendor.userId' => $userId)));
		$this->set('data', $vendorId);
		
		$menuItems = $this->Menu->find('all', array('conditions' => array('Menu.vendorId' => $vendorId['Vendor']['vendorId'])));
		$this->set('menu', $menuItems);
		
		if ($this->request->is('post')) {
					
            $this->Location->create();
            if ($this->Menu->save($this->request->data)) {
            	$this->Session->setFlash(__('Menu Item Saved'));
            	$this->render('/vendors/success');
            } else {
	            echo ('error');
            }
        }
    }
    
    //Delete Menu Items
    public function deleteMenu($id = null){
	    
	    if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        echo('wtf');
        $this->Menu->id = $id;  
        if ($this->Menu->delete()) {
            $this->Session->setFlash(__('Menu Item Deleted'));
            $this->render('success');
        }else{
        	$this->Session->setFlash(__('User was not deleted'));
			$this->redirect(array('action' => 'index'));
		}	
	    
    }
    
    //View Reviews
    public function review(){
		
		$userId = $this->Auth->user('userId');
	    $vendorId = $this->Vendor->find('first', array('fields' => 'vendorId', 'conditions' => array('Vendor.userId' => $userId)));		
		$reviews = $this->Review->find('all', array('conditions' => array('Review.vendorId' => $vendorId['Vendor']['vendorId'])));
		$this->set('data', $reviews);
		 
    }
    
    //Change to Home
    public function success() {
		
	}
	
	
}

