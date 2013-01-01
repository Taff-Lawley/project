<?php
App::uses('AppController', 'Controller');
/**
 * Environments Controller
 *
 * @property Environment $Environment
 */
class EnvironmentsController extends AppController {

	function beforeFilter() {
		$this->Auth->deny('*');
		parent::beforeFilter();
	}

	
	function isAuthorized() {
		if ($this->Auth->User('Group.id') == 1) {
			return true;
		//Allow access to all areas that have an id passed apart from delete
		}elseif ($this->action=="delete"){
			return false;
		}elseif ($this->action=="edit") {
			if($this->Session->read('Environments.'.$this->params->pass[0])==1){
				return true;
			}else{
				$this->_logData();
				return false;			
			}
		}elseif ($this->Session->read('Environments.'.$this->params->pass[0])!=null) {
			return true;
		}else{
			$this->_logData();
			return false;
		}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Environment->recursive = 0;
		$this->set('environments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Environment->id = $id;
		if (!$this->Environment->exists()) {
			throw new NotFoundException(__('Invalid environment'));
		}
		$this->Environment->recursive=2;
		$this->set('environment', $this->Environment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Environment->create();
			if ($this->Environment->save($this->request->data)) {
				$this->Session->setFlash(__('The environment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The environment could not be saved. Please, try again.'));
			}
		}
		$users = $this->Environment->User->find('list');
		$users = $this->Environment->User->find('list');
		$this->set(compact('users', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Environment->id = $id;
		if (!$this->Environment->exists()) {
			throw new NotFoundException(__('Invalid environment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Environment->save($this->request->data)) {
				$this->Session->setFlash(__('The environment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The environment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Environment->read(null, $id);
		}
		$users = $this->Environment->User->find('list');
		$this->set(compact('users', 'users'));
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
		$this->Environment->id = $id;
		if (!$this->Environment->exists()) {
			throw new NotFoundException(__('Invalid environment'));
		}
		if ($this->Environment->delete()) {
			$this->Session->setFlash(__('Environment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Environment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
