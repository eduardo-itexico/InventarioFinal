<?php
App::uses('Sell', 'Model');

/**
 * Sell Test Case
 *
 */
class SellTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sell',
		'app.customers',
		'app.users',
		'app.product',
		'app.categories',
		'app.unities',
		'app.order',
		'app.supliers',
		'app.orders_product',
		'app.sells_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Sell = ClassRegistry::init('Sell');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sell);

		parent::tearDown();
	}

}
