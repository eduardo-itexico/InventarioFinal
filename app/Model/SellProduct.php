<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */
class SellProduct extends AppModel {

    public $useTable = 'sells_products';
    
    public $belongsTo = array(
        'Sell', 'Product'
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
