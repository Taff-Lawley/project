<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	function beforeFilter() {
		$this->Auth->allow('register','login','logout');
		parent::beforeFilter();
	}
	
	function isAuthorized() {
		
		if ($this->Auth->User('Group.id') == 1) {
			return true;
		}elseif ($this->action=='profile') {
			return true;
		}else{
			$this->_logData();
			return false;
		}
	}

	function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				CakeLog::write('access', $this->Auth->User('id').' logged in');
				$this->redirect(array('controller' => 'users', 'action' => 'profile'));
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}
	
	function logout() {
		$this->Session->setFlash(__('Successfully logged out'));
		CakeLog::write('access', $this->Auth->User('id').' logged out');
		$this->redirect($this->Auth->logout());
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->User->recursive=1;
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * profile method
 *
 * @throws NotFoundException
 * @param 
 * @return void
 */
	public function profile() {
		$this->User->id = $this->Auth->User('id');
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->User->bindModel(array('hasOne' => array('EnvironmentsUsers')));
		$userEnvironments = $this->User->EnvironmentsUsers->find('all', array(
										'fields' => array("environment_id","group_id"),
                                        'conditions' => array('EnvironmentsUsers.user_id' => $this->User->id),
                                        'recursive' => -1
		));
		//Session data for user environments stored as 
		$this->Session->delete("Environments");
		foreach($userEnvironments as $key => $value){
			$this->Session->write("Environments.".$value['EnvironmentsUsers']['environment_id'], $value['EnvironmentsUsers']['group_id']);
		}
		
		$this->User->bindModel(array('hasOne' => array('EnvironmentsUsers')));
		$userEnvironments = $this->User->find('first', array(
                                        'conditions' => array('EnvironmentsUsers.user_id' => $this->User->id),
                                        'recursive' => 1
		));
		
		if($userEnvironments==false){
			$userEnvironments = $this->User->read(null, $this->User->id);
		}
		$this->set('group',$this->User->Group->find("list"));
		$this->set('user',$userEnvironments);
	}
	
/**
 * add method
 *
 * @return void
 */	
	public function add() {
		$this->redirect(array('controller' => 'users', 'action' => 'register'));
	}
/**
 * register method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$environments = $this->User->Environment->find('list');
		$projects = $this->User->Project->find('list');
		$this->set(compact('groups', 'environments', 'projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
		}
		$groups = $this->User->Group->find('list');
		$environments = $this->User->Environment->find('list');
		$projects = $this->User->Project->find('list');
		$this->set(compact('groups', 'environments', 'projects'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
