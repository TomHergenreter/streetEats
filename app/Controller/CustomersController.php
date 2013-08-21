<?php

App::uses('Sanitize', 'Utility');

class CustomersController extends AppController {
	
	var $uses = array('Vendor', 'Location', 'Menu', 'Review', 'Customer', 'Deal', 'Favorite');
	var $layout = 'customers';
	var $active = null;
	
	//Set Variables for Layout
	function beforeFilter() {

		date_default_timezone_set("America/Denver");
		if($img = $this->Customer->find('first', array('fields' => 'email', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))))){
			$hash = md5(strtolower(trim($img['Customer']['email'])));
			$this->set('avatar', 'http://www.gravatar.com/avatar/' . $hash . '?s=100');
			
			$name = $this->Auth->user('username');
			$this->set('name', $name);
		}
	} 
	
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
            	$this->redirect(array('controller' => 'customers', 'action' => 'find'));
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
                $this->redirect(array('action' => 'edit'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->response->data = $this->Customer->read(null, $id);
        }
    }
	
	public function updateLocation($zip = null){
	
		$customerValue = $this->Customer->find('first', array('fields' => array('customerId'),'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		$this->Customer->id = $customerValue['Customer']['customerId'];
		$this->Customer->saveField('zip', $zip);
	}
	
	//Find Trucks
	public function find() {
	
		
		$customer = $this->Customer->find('first', array('fields' => 'zip', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));				
		//Map 
		$this->helpers[] = 'GoogleMap';
		$trucks = $this->Location->find('all', array('conditions' => array('Location.date' => date('Y-m-d'), 'Location.from' < date('H:i:s'), 'Location.to' > date('H:i:s'), 'Location.zip' => $customer['Customer']['zip'], 'Location.locationType' => 1)));
		
		$data = array();
		foreach ($trucks as $truck){
			$vendorName = $this->Vendor->find('first', array('fields' => 'businessName', 'conditions' => array('Vendor.vendorId' => $truck['Location'])));
			$truck['Location']['businessName'] = $vendorName['Vendor']['businessName'];
			$data[] = $truck;
		};
		$this->set('matches', $data);
		
		//Search Function
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
			
			//Remove duplicate results
			$ids = array();
			foreach($results as $resultArray){
				foreach($resultArray as $result){
					$ids[] = $result['Vendor']['vendorId'];
				}
			}
			
			//Set view variable
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
		$active = 'favorites';
	}
	
	//Add Favorites
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
	
	//Delete Favorites
	public function removeFavorites($vendorId = null){
		$customerId = $this->Customer->find('first', array('fields' => 'customerId', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		
		if($this->Favorite->deleteAll(array('Favorite.vendorId' => $vendorId, 'Favorite.customerId' => $customerId['Customer']['customerId']))){
			$this->Session->setFlash(__('The Vendor Has Been Removed'));
			$this->redirect(array('controller' => 'customers', 'action' => 'favorites'));
		}else{
			$this->Session->setFlash(__('Request Could Not Be Completed, Please Try Again Later'));
		}
	}
	
	//Write Review
	public function addReview($vendorId = null){
		$customerId = $this->Customer->find('first', array('fields' => 'customerId', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		$this->set('customerId', $customerId);
		$this->set('vendorId', $vendorId);
		if($this->request->is('post')){
			$this->Review->create();
			if($this->Review->save($this->request->data)){
				$this->Session->setFlash(__('Your Review Has Been Added'));
				$this->redirect(array('controller' => 'customers', 'action' => 'reviews'));	
			}else{
				$this->Session->setFlash(__('Your Review Could Not Be Entered At This Time'));	
			}
		}
	}
	
	//View Reviews
	public function reviews(){
		$customerId = $this->Customer->find('first', array('fields' => 'customerId', 'conditions' => array('Customer.userId' => $this->Auth->user('userId'))));
		$reviews = $this->Review->find('all', array('conditions' => array('Review.customerId' => $customerId['Customer']['customerId'])));
				
		$data = array();
		foreach ($reviews as $review){
			$vendorName = $this->Vendor->find('first', array('fields' => 'businessName', 'conditions' => array('Vendor.vendorId' => $review['Review'])));
			$review['Review']['businessName'] = $vendorName['Vendor']['businessName'];	
			$data[] = $review;
		}
		$this->set('data', $data);		
	}
	
	//Delete Reviews
	public function deleteReview($id = null){
	
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
 
        $this->Review->id = $id;  
        if ($this->Review->delete()) {
            $this->Session->setFlash(__('Review Deleted'));
            $this->redirect(array('controller' => 'customers', 'action' => 'reviews'));
        }else{
        	$this->Session->setFlash(__('Review Was Not Deleted, Please Try Again Later'));
			$this->redirect(array('action' => 'reviews'));
		}
	}
	
	public function success() {
		
	}

}

