<?php
App::uses('AppController', 'Controller');
/**
 * ProjectsUsers Controller
 *
 * @property ProjectsUser $ProjectsUser
 */
class ProjectsUsersController extends AppController {

function beforeFilter() {
		$this->Auth->deny('*');
		parent::beforeFilter();
	}
	
	function isAuthorized() {
		if ($this->Auth->User('Group.name') == 'admin') {
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
		$this->ProjectsUser->recursive = 0;
		$this->set('projectsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ProjectsUser->id = $id;
		if (!$this->ProjectsUser->exists()) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		$this->ProjectsUser->recursive=1;
		$this->set('projectsUser', $this->ProjectsUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectsUser->create();
			if ($this->ProjectsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projects user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects user could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ProjectsUser->Project->find('list');
		$users = $this->ProjectsUser->User->find('list');
		$groups = $this->ProjectsUser->Group->find('list');
		$this->set(compact('projects', 'users', 'groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ProjectsUser->id = $id;
		if (!$this->ProjectsUser->exists()) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProjectsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The projects user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projects user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ProjectsUser->read(null, $id);
		}
		$projects = $this->ProjectsUser->Project->find('list');
		$users = $this->ProjectsUser->User->find('list');
		$groups = $this->ProjectsUser->Group->find('list');
		$this->set(compact('projects', 'users', 'groups'));
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
		$this->ProjectsUser->id = $id;
		if (!$this->ProjectsUser->exists()) {
			throw new NotFoundException(__('Invalid projects user'));
		}
		if ($this->ProjectsUser->delete()) {
			$this->Session->setFlash(__('Projects user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Projects user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
