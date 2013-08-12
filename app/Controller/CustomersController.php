<?php

App::uses('Sanitize', 'Utility');

class CustomersController extends AppController {
	
	var $uses = array('Vendor', 'Location', 'Menu', 'Review', 'Customer', 'Deal', 'Favorite');
	var $layout = 'customers'; 
	
	//Add new customer
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
	
	//Edit customer data
	public function edit($id = NULL) {
		$userId = $this->Auth->user('userId');
	
        $customerValue = $this->Customer->find('first', array('fields' => array('customerId','firstName', 'lastName' , 'email', 'zip', 'imageName', 'userId'),'conditions' => array('Customer.userId' => $userId)));
		
		$this->set('data', $customerValue);
		
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Customer->save($this->request->data)) {
                $this->Session->setFlash(__('Your information has been updated'));
                $this->render('/customers/success');
                //$this->redirect(array('action' => 'success'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Customer->read(null, $id);
        }
    }
	
	//Find Trucks
	public function find() {
		
		//Map 
		$this->helpers[] = 'GoogleMap';
		$trucks = $this->Location->find('all', array('conditions' => array('Location.date' => date('Y-m-d'), 'Location.from' < date('H:i:s'), 'Location.to' > date('H:i:s'))));
		
		$this->set('matches', $trucks);
		
		if ($this->request->is('post')){
			$this->request->data = Sanitize::clean($this->request->data, array('encode' => true, 'remove_html' => true));
			$data = $this->request->data;
			$search = $data['Vendor']['search'];
			$searchTerms = explode(' ', $search);
		}
		
		if ($this->request->is('post') && strlen($searchTerms[0]) > 2){
		
			//Get results
			$results = array();
			foreach ($searchTerms as $term) {
				$query = $this->Vendor->find('all', array('fields' => array('foodType', 'businessName', 'zip', 'vendorId'), 'conditions' => array('OR' => array('Vendor.foodType LIKE' => '%' . $term . '%', 'Vendor.businessName LIKE' => '%' . $term . '%'))));
				$results[] = $query;
			}
			
			//remove duplicate results
			$ids = array();
			foreach($results as $resultArray){
				foreach($resultArray as $result){
					$ids[] = $result['Vendor']['vendorId'];
				}
			}
			
			//set view variable
			$finalResults = array();
			$uniqueIds = array_unique($ids);
			foreach($uniqueIds as $id){
				$finalResults[] = $this->Vendor->find('all', array('conditions' => array('Vendor.vendorId' => $id)));
			}
			$this->set('results', $finalResults);
		}else if (!$this->request->is('post')){
			$this->set('results', ' ');
		}
	}
	
	//Display Menus
	public function menus($id = null){
		$menuItems = $this->Menu->find('all', array('conditions' => array('Menu.vendorId' => $id)));
		$vendor = $this->Vendor->find('first', array('fields' => 'businessName', 'conditions' => array('Vendor.vendorId' => $id)));
		$this->set('menuItems', $menuItems);
		$this->set('vendor', $vendor['Vendor']['businessName']);
	}
	
	//Read Favorites
	public function favorites(){
		$customerId = $this->Customer->find('first', array('fields' => 'customerId', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		$favoriteIds = $this->Favorite->find('all', array('conditions' => array('Favorite.customerId' => $customerId['Customer']['customerId'])));
		
		$favorites = array();
		foreach ($favoriteIds as $favorite){
			$vendor = $favorite['Favorite']['vendorId'];
			$favorites[] = $this->Vendor->find('first', array('conditions' => array('Vendor.vendorId' => $vendor)));
		}
		$this->set('favorites', $favorites);
	}
	
	public function addFavorites($vendorId = null){
		$customerId = $this->Customer->find('first', array('fields' => 'customerId', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		$data = array('Favorite' => array('customerId' => $customerId['Customer']['customerId'], 'vendorId' => $vendorId));
		if($this->Favorite->save($data)){
			$this->redirect('/customers/favorites/');
		}else{
			$this->Session->setFlash(__('Request Could Not Be Completed'));
			$this->redirect(array('controller' => 'customers', 'action' => 'success'));
		}
	}
	
	public function removeFavorites($vendorId = null){
		$customerId = $this->Customer->find('first', array('fields' => 'customerId', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		
		if($this->Favorite->deleteAll(array('Favorite.vendorId' => $vendorId, 'Favorite.customerId' => $customerId['Customer']['customerId']))){
			$this->Session->setFlash(__('The Vendor Has Been Removed'));
			$this->redirect(array('controller' => 'customers', 'action' => 'favorites'));
		}
	}
	
	public function success() {
		
	}

}

