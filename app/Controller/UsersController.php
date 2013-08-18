<?php

class UsersController extends AppController {
	
	var $uses = array('Vendor', 'Location');
	
    public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add'); // Letting users register themselves
	    $this->Auth->allow('index'); 
	}

	public function login() {
	
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	$this->request->data = $this->Auth->user();
	        	if ($this->request->data['userType'] == '1'){
	            	$this->redirect(array('controller' => 'customers', 'action' => 'find'));
            	}else if ($this->request->data['userType'] == '2'){
	            	$this->redirect(array('controller' => 'vendors', 'action' => 'location'));
            	}
	        }else{
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	    $this->Session->setFlash(__('Come Back Soon'));
	}

    public function index() {
       
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
            	$this->Auth->login();
            	if ($this->request->data['User']['userType'] == '1'){
	            	$this->redirect(array('controller' => 'customers', 'action' => 'add'));
            	}else if ($this->request->data['User']['userType'] == '2'){
	            	$this->redirect(array('controller' => 'vendors', 'action' => 'add'));
            	}
                
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        
        $this->User->id = $this->Auth->user('userId');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect($this->Auth->logout());
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}

?>