<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	var $components = array('Auth', 'Session', 'Security');
	var $helpers = array('Form', 'Session');
	
	function beforeFilter() {
		$this->Auth->authorize = 'controller';
		$this->Auth->loginError = "This message shows up when the wrong credentials are used";
		$this->Auth->authError = "This error shows up with the user tries to access a part of the website that is protected.";
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'login');
	}
	
	function _logData() {
		$logData = $this->Auth->User('id')." unauthorised attempt to access ".$this->params->controller." -> ".$this->action;
		if(isset($this->params->pass[0])){
			$logData .= " -> ".$this->params->pass[0];
		}
		if(isset($this->params->named[0])){
			$logData .= " -> ".$this->params->named[0];
		}
		CakeLog::write('access', $logData);
	}

}
