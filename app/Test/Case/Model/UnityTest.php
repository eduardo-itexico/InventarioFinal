<?php
App::uses('Unity', 'Model');

/**
 * Unity Test Case
 *
 */
class UnityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.unity'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Unity = ClassRegistry::init('Unity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Unity);

		parent::tearDown();
	}

}
