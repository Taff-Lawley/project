<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @property Project $Project
 */
class ProjectsController extends AppController {

	function beforeFilter() {
		$this->Auth->deny('*');
		parent::beforeFilter();
	}
	
/* 	$this->Project->bindModel(array('hasOne' => array('ProjectsUsers')));
	$projectUsers = $this->Project->ProjectsUsers->find('all', array(
									'fields' => array('MAX(ProjectsUsers.group_id) as gp'),
									'conditions' => array('ProjectsUsers.user_id' => $this->Auth->User('id'), 'ProjectsUsers.project_id' => $id),
									'recursive' => -1
	));
		
	debug($projectUsers); */
	
	function isAuthorized() {
		if ($this->Auth->User('Group.id') == 1) {
			return true;
		}else{
			return true;
		}
	}
	
	function _checkProjectAccess($project_id, $action){
		debug($action);
		if ($this->Auth->User('Group.id') != 1){
			$this->Project->recursive = -1;
			$projects = $this->Project->find('first',array('conditions' => array('Project.id' => $project_id)));
			//Generally allowed access to project
			if ($this->Session->read('Environments.'.$projects['Project']['environment_id'])==null){
				$this->Session->setFlash($this->Auth->authError);
				$this->redirect($this->Auth->loginRedirect);
			}
		}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Project->recursive = 0;
		$this->set('projects', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->_checkProjectAccess($id, $this->action);
		$this->Project->id = $id;
		
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		
		$this->Project->bindModel(array('hasOne' => array('ProjectsUsers')));
		$userPermissions = $this->Project->find('first', array(
										'fields' => array('ProjectsUsers.group_id'),
                                        'conditions' => array('ProjectsUsers.user_id' => $this->Session->read('Auth.User.id')),
                                        'recursive' => 0
		));

		$this->Session->delete('Projects'.$id);
		$this->Session->write('Projects'.$id, $userPermissions['ProjectsUsers']['group_id']);

		$this->Project->User->Group->recursive = -1;
		$group = $this->Project->User->Group->find('list');
		$this->set('group', $group);
		
		$this->Project->recursive=1;
		$tmp = $this->Project->read(null, $id);
		$this->set('project', $tmp);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Project->create();
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		}
		$clients = $this->Project->Client->find('list');
		$environments = $this->Project->Environment->find('list');
		$users = $this->Project->User->find('list');

		$this->set(compact('clients', 'environments', 'users', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Project->id = $id;
		$this->_checkProjectAccess($id, $this->action);
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Project->read(null, $id);
		}
		$clients = $this->Project->Client->find('list');
		$environments = $this->Project->Environment->find('list');
		$users = $this->Project->User->find('list');
		$statuses = $this->Project->Status->find('list');
		$this->set(compact('clients', 'environments', 'users', 'statuses'));
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
		$this->Project->id = $id;
		if (!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid project'));
		}
		if ($this->Project->delete()) {
			$this->Session->setFlash(__('Project deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Project was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
