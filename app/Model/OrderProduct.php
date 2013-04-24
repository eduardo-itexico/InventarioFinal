<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */
class OrderProduct extends AppModel {

    public $useTable = 'orders_products';
    
    public $belongsTo = array(
        'Order', 'Product'
    );

    public $validate = array(
        'cantidad' => array(
            'rule' => 'numeric',
            'message' => 'Selecciona una cantidad'
        ),
        'precio' => array(
            'rule' => 'notEmpty',
            'message' => 'Corrige el precio'
        )
    );
}
