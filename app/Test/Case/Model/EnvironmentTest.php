<?php
App::uses('Environment', 'Model');

/**
 * Environment Test Case
 *
 */
class EnvironmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.environment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Environment = ClassRegistry::init('Environment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Environment);

		parent::tearDown();
	}

}
