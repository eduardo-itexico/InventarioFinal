<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Customer->recursive = 0;
		$customers = $this->paginate();
		if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["Customer.nombre LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["Customer.direccion LIKE"]  = "%$search%"; 
			$conditions["conditions"]["OR"]["Customer.ciudad LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["Customer.telefono LIKE"]  	= "%$search%";
			$conditions["conditions"]["OR"]["Customer.rfc LIKE"]  		= "%$search%"; 
			$customers = $this->Customer->find('all',$conditions);
		}
		$this->set('customers', $customers);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->set('customer', $this->Customer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Customer->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->Customer->delete()) {
			$this->Session->setFlash(__('Customer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Customer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	*
	*/
	
	public function __searchCustomer($search){
		$conditions["conditions"]["OR"]["Customer.nombre LIKE"]  	= "%$search%"; 
		$conditions["conditions"]["OR"]["Customer.direccion LIKE"]  = "%$search%"; 
		$conditions["conditions"]["OR"]["Customer.ciudad LIKE"]  	= "%$search%"; 
		$conditions["conditions"]["OR"]["Customer.telefono LIKE"]  	= "%$search%";
		$conditions["conditions"]["OR"]["Customer.rfc LIKE"]  		= "%$search%"; 
		$products = $this->Customer->find('all',$conditions);
		return $products;
	}
	/**
	*
	*/
	public function searchJSON(){
		try{
			//var_dump($this->request->data);
			$this->Customer->recursive = 0;
			$campo_busqueda = isset($this->request->data["Customer"]["busqueda"])?
											$this->request->data["Customer"]["busqueda"]:
											"";
			$body["data"] = $this->__searchCustomer($campo_busqueda);
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return new CakeResponse(array('body' => json_encode($body)));
    }
	
	
}
