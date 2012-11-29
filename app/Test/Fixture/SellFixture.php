<?php
/**
 * SellFixture
 *
 */
class SellFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'subtotal' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'iva' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'total' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'customers_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'facturado' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ventas_clientes1' => array('column' => 'customers_id', 'unique' => 0),
			'fk_ventas_users1' => array('column' => 'users_id', 'unique' => 0)
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
			'subtotal' => 1,
			'iva' => 1,
			'total' => 1,
			'customers_id' => 1,
			'users_id' => 1,
			'date' => '2012-11-19 19:07:19',
			'facturado' => 1
		),
	);

}
