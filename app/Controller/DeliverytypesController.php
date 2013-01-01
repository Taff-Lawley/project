<?php
App::uses('AppController', 'Controller');
/**
 * Deliverytypes Controller
 *
 * @property Deliverytype $Deliverytype
 */
class DeliverytypesController extends AppController {

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
		$this->Deliverytype->recursive = 0;
		$this->set('deliverytypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Deliverytype->id = $id;
		if (!$this->Deliverytype->exists()) {
			throw new NotFoundException(__('Invalid deliverytype'));
		}
		$this->Deliverytype->recursive=1;
		$this->set('deliverytype', $this->Deliverytype->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Deliverytype->create();
			if ($this->Deliverytype->save($this->request->data)) {
				$this->Session->setFlash(__('The deliverytype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deliverytype could not be saved. Please, try again.'));
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
		$this->Deliverytype->id = $id;
		if (!$this->Deliverytype->exists()) {
			throw new NotFoundException(__('Invalid deliverytype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Deliverytype->save($this->request->data)) {
				$this->Session->setFlash(__('The deliverytype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The deliverytype could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Deliverytype->read(null, $id);
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
		$this->Deliverytype->id = $id;
		if (!$this->Deliverytype->exists()) {
			throw new NotFoundException(__('Invalid deliverytype'));
		}
		if ($this->Deliverytype->delete()) {
			$this->Session->setFlash(__('Deliverytype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Deliverytype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
