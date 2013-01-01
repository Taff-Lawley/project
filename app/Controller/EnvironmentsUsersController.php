<?php
App::uses('AppController', 'Controller');
/**
 * EnvironmentsUsers Controller
 *
 * @property EnvironmentsUser $EnvironmentsUser
 */
class EnvironmentsUsersController extends AppController {

function beforeFilter() {
		$this->Auth->deny('*');
		parent::beforeFilter();
	}
	
	function isAuthorized() {
		if ($this->Auth->User('Group.id') == '1') {
			return true;
		}else{
			return false;
		}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EnvironmentsUser->recursive = 0;
		$this->set('environmentsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EnvironmentsUser->id = $id;
		if (!$this->EnvironmentsUser->exists()) {
			throw new NotFoundException(__('Invalid environments user'));
		}
		$this->EnvironmentsUser->recursive=1;
		$this->set('environmentsUser', $this->EnvironmentsUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EnvironmentsUser->create();
			if ($this->EnvironmentsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The environments user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The environments user could not be saved. Please, try again.'));
			}
		}
		$users = $this->EnvironmentsUser->User->find('list');
		$environments = $this->EnvironmentsUser->Environment->find('list');
		$groups = $this->EnvironmentsUser->Group->find('list');
		$this->set(compact('users', 'environments', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->EnvironmentsUser->id = $id;
		if (!$this->EnvironmentsUser->exists()) {
			throw new NotFoundException(__('Invalid environments user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EnvironmentsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The environments user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The environments user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EnvironmentsUser->read(null, $id);
		}
		$users = $this->EnvironmentsUser->User->find('list');
		$environments = $this->EnvironmentsUser->Environment->find('list');
		$groups = $this->EnvironmentsUser->Group->find('list');
		$this->set(compact('users', 'environments', 'groups'));
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
		$this->EnvironmentsUser->id = $id;
		if (!$this->EnvironmentsUser->exists()) {
			throw new NotFoundException(__('Invalid environments user'));
		}
		if ($this->EnvironmentsUser->delete()) {
			$this->Session->setFlash(__('Environments user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Environments user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
