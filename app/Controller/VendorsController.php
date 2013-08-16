<?php
class VendorsController extends AppController {
	
	var $uses = array('Vendor', 'Location', 'Menu', 'Review', 'Customer', 'Deal');
	var $layout = 'vendor';
	
	//Set Variables for Layout
	function beforeFilter() {
		if($img = $this->Vendor->find('first', array('fields' => 'email', 'conditions' => array('Vendor.userId' => $this->Auth->user('userId'))))){
			$hash = md5(strtolower(trim($img['Vendor']['email'])));
			$this->set('avatar', 'http://www.gravatar.com/avatar/HASH' . $hash . '?s=100');
			
			$name = $this->Vendor->find('first', array('fields' => 'businessName', 'conditions' => array('Vendor.userId' => $this->Auth->user('userId'))));
			$this->set('name', $name['Vendor']['businessName']);
		}
	}	
	 
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
            	$this->render('/vendors/location');
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
                $this->redirect(array('action' => 'edit'));
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
		
		$locations = $this->Location->find('all', array('fields' => 'streetAddress, zip, date, to', 'conditions' => array('Location.vendorId' => $vendorId['Vendor']['vendorId'])));
		$this->set('locations', $locations);
		
		if ($this->request->is('post')) {
			
			//Prevent Duplicates
			$flag = false;
			foreach($locations as $location){
				if($this->request->data['Location']['date'] == $location['Location']['date'] && $this->request->data['Location']['to'] . ':00' == $location['Location']['to']){
					$this->Session->setFlash(__('You Have Already Entered A Location For This Time'));
					$flag = true;	
				}
			}
			
			if($flag == false){
				if ($this->request->data['Location']['locationType'] == 1) {
	            	$oldLocations = $this->Location->find('all', array('conditions' => array('Location.vendorId' => $vendorId['Vendor']['vendorId'])));
	            	foreach($oldLocations as $location){
	            		$this->Location->id = $location['Location']['locationId'];
		            	$this->Location->saveField('locationType', 3);
	            	}
            	}		
	            $this->Location->create();
	            if ($this->Location->save($this->request->data)) {
	            	$this->Session->setFlash(__('Your Location Has Been Updated!'));
	            	$this->redirect(array('action' => 'location'));
	            } else {
		            $this->Session->setFlash(__('Your Location Could Not Be Updated, Please Try Again Later'));
	            }
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
					
            $this->Menu->create();
            if ($this->Menu->save($this->request->data)) {
            	$this->Session->setFlash(__('Menu Item Saved'));
            	$this->redirect(array('action' => 'menu'));
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
        $this->Menu->id = $id;  
        if ($this->Menu->delete()) {
            $this->Session->setFlash(__('Menu Item Deleted'));
            $this->render('success');
        }else{
        	$this->Session->setFlash(__('Menu Item Was Not Deleted, Please Try Again Later'));
			$this->redirect(array('action' => 'index'));
		}	
	    
    }
    
    //View Reviews
    public function review(){
		
		$vendorId = $this->Vendor->find('first', array('fields' => 'vendorId', 'conditions' => array('Vendor.userId' => $this->Auth->user('userId'))));
		$reviews = $this->Review->find('all', array('conditions' => array('Review.vendorId' => $vendorId['Vendor']['vendorId'])));
				
		$data = array();
		foreach ($reviews as $review){
			$customerName = $this->Customer->find('first', array('fields' => 'firstName', 'conditions' => array('Customer.customerId' => $review['Review'])));
			$review['Review']['customerName'] = $customerName['Customer']['firstName'];	
			$data[] = $review;
		}
		$this->set('data', $data);
    }
    
    //Create Deals
    public function deals(){
    
	    $userId = $this->Auth->user('userId');
	    $vendorId = $this->Vendor->find('first', array('fields' => 'vendorId, timezone', 'conditions' => array('Vendor.userId' => $userId)));
		$this->set('data', $vendorId);
		
		$deals = $this->Deal->find('all', array('conditions' => array('Deal.vendorId' => $vendorId['Vendor']['vendorId'])));
		$this->set('deal', $deals);
		
		$deals = $this->Deal->find('all', array('conditions' => array('Deal.vendorId' => $vendorId['Vendor']['vendorId'])));
		
		$currentDate = strtotime(date('mdy')) - $vendorId['Vendor']['timezone'];
		$currentDeals = array();
		foreach ($deals as $deal){
			$expires = strtotime($deal['Deal']['dealExpiration']);
			if ($expires >= $currentDate){
				$currentDeals[] = $deal; 
			}
		}
		
		$this->set('currentDeals', $currentDeals);
	
		if ($this->request->is('post')) {
					
            $this->Deal->create();
            if ($this->Deal->save($this->request->data)) {
            	$this->Session->setFlash(__('Your Deals Have Been Updated'));
            	$this->redirect(array('action' => 'deals'));
            } else {
	            echo ('error');
            }
        }
    }
    
    //Change to Home
    public function success() {
		
	}
	
	
}

