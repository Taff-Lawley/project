<?php
App::uses('AppController', 'Controller');
/**
 * Contactpeople Controller
 *
 * @property Contactperson $Contactperson
 */
class ContactpeopleController extends AppController {

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
		$this->Contactperson->recursive = 0;
		$this->set('contactpeople', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Contactperson->id = $id;
		if (!$this->Contactperson->exists()) {
			throw new NotFoundException(__('Invalid contactperson'));
		}
		$this->Contactperson->recursive=1;
		$this->set('contactperson', $this->Contactperson->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contactperson->create();
			if ($this->Contactperson->save($this->request->data)) {
				$this->Session->setFlash(__('The contactperson has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contactperson could not be saved. Please, try again.'));
			}
		}
		$environments = $this->Contactperson->Environment->find('list');
		$clients = $this->Contactperson->Client->find('list');
		$this->set(compact('environments', 'clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Contactperson->id = $id;
		if (!$this->Contactperson->exists()) {
			throw new NotFoundException(__('Invalid contactperson'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contactperson->save($this->request->data)) {
				$this->Session->setFlash(__('The contactperson has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contactperson could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contactperson->read(null, $id);
		}
		$environments = $this->Contactperson->Environment->find('list');
		$clients = $this->Contactperson->Client->find('list');
		$this->set(compact('environments', 'clients'));
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
		$this->Contactperson->id = $id;
		if (!$this->Contactperson->exists()) {
			throw new NotFoundException(__('Invalid contactperson'));
		}
		if ($this->Contactperson->delete()) {
			$this->Session->setFlash(__('Contactperson deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Contactperson was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
