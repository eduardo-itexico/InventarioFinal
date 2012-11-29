<?php
/**
 * StockFixture
 *
 */
class StockFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'minimo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'maximo' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'actual' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'products_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_stocks_products1' => array('column' => 'products_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'minimo' => 1,
			'maximo' => 1,
			'actual' => 1,
			'products_id' => 1
		),
	);

}
