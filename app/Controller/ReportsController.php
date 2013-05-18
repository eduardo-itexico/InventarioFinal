<?php
App::uses('AppController', 'Controller');
/**
 * Reports Controller
 *
 * @property User $User
 */
class ReportsController extends AppController {
	
	public $uses = array("Customer");

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$customers = $this->Customer->find('list');
		$this->set(compact('customers'));
		
	}

}
