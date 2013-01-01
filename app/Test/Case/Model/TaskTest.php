<?php
App::uses('Task', 'Model');

/**
 * Task Test Case
 *
 */
class TaskTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.task',
		'app.milestone',
		'app.deliverytype',
		'app.project',
		'app.client',
		'app.environment',
		'app.contactperson',
		'app.user',
		'app.group',
		'app.environments_user',
		'app.projects_user',
		'app.reporter',
		'app.status',
		'app.tasks_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Task = ClassRegistry::init('Task');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Task);

		parent::tearDown();
	}

}
