<?php
App::uses('Suplier', 'Model');

/**
 * Suplier Test Case
 *
 */
class SuplierTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.suplier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Suplier = ClassRegistry::init('Suplier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Suplier);

		parent::tearDown();
	}

}
