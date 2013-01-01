<?php
App::uses('AppController', 'Controller');
/**
 * Worktypes Controller
 *
 * @property Worktype $Worktype
 */
class WorktypesController extends AppController {

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
		$this->Worktype->recursive = 0;
		$this->set('worktypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Worktype->id = $id;
		if (!$this->Worktype->exists()) {
			throw new NotFoundException(__('Invalid worktype'));
		}
		$this->Worktype->recursive=1;
		$this->set('worktype', $this->Worktype->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Worktype->create();
			if ($this->Worktype->save($this->request->data)) {
				$this->Session->setFlash(__('The worktype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The worktype could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Worktype->id = $id;
		if (!$this->Worktype->exists()) {
			throw new NotFoundException(__('Invalid worktype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Worktype->save($this->request->data)) {
				$this->Session->setFlash(__('The worktype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The worktype could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Worktype->read(null, $id);
		}
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
		$this->Worktype->id = $id;
		if (!$this->Worktype->exists()) {
			throw new NotFoundException(__('Invalid worktype'));
		}
		if ($this->Worktype->delete()) {
			$this->Session->setFlash(__('Worktype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Worktype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
