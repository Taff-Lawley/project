<?php
App::uses('Contactperson', 'Model');

/**
 * Contactperson Test Case
 *
 */
class ContactpersonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contactperson',
		'app.environment',
		'app.client',
		'app.project'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contactperson = ClassRegistry::init('Contactperson');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contactperson);

		parent::tearDown();
	}

}
