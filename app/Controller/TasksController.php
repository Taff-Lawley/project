<?php
App::uses('AppController', 'Controller');
/**
 * Tasks Controller
 *
 * @property Task $Task
 */
class TasksController extends AppController {

function beforeFilter() {
		$this->Auth->deny('*');
		parent::beforeFilter();
	}
	
	function isAuthorized() {
		if ($this->Auth->User('Group.id') == '1') {
			echo "authorised";
			return true;
		}else{
			echo "maybe auth'ed";
			return false;
		}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Task->recursive = 0;
		$this->set('tasks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->Task->recursive=1;
		$this->set('task', $this->Task->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('The task has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.'));
			}
		}
		$milestones = $this->Task->Milestone->find('list');
		$users = $this->Task->User->find('list');
		$reporters = $this->Task->Reporter->find('list');
		$statuses = $this->Task->Status->find('list');
		$users = $this->Task->User->find('list');
		$this->set(compact('milestones', 'users', 'reporters', 'statuses', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Task->save($this->request->data)) {
				$this->Session->setFlash(__('The task has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Task->read(null, $id);
		}
		$milestones = $this->Task->Milestone->find('list');
		$users = $this->Task->User->find('list');
		$reporters = $this->Task->Reporter->find('list');
		$statuses = $this->Task->Status->find('list');
		$users = $this->Task->User->find('list');
		$this->set(compact('milestones', 'users', 'reporters', 'statuses', 'users'));
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
		$this->Task->id = $id;
		if (!$this->Task->exists()) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->Task->delete()) {
			$this->Session->setFlash(__('Task deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Task was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
