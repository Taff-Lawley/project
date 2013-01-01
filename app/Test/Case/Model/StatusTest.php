<?php
App::uses('Status', 'Model');

/**
 * Status Test Case
 *
 */
class StatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status',
		'app.task',
		'app.milestone',
		'app.deliverytype',
		'app.project',
		'app.client',
		'app.environment',
		'app.user',
		'app.group',
		'app.environments_user',
		'app.projects_user',
		'app.contactperson',
		'app.reporter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Status = ClassRegistry::init('Status');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Status);

		parent::tearDown();
	}

}
