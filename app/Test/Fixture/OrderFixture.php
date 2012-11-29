<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'fecha' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'subtotal' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'iva' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'total' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,2'),
		'supliers_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_ordernes_proveedores1' => array('column' => 'supliers_id', 'unique' => 0)
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
			'fecha' => '2012-11-19 18:58:48',
			'subtotal' => 1,
			'iva' => 1,
			'total' => 1,
			'supliers_id' => 1
		),
	);

}
