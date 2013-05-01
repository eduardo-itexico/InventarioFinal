<?php
App::uses('AppController', 'Controller');
/**
 * Supliers Controller
 *
 * @property Suplier $Suplier
 */
class SupliersController extends AppController {

	public $paginate = array(
			'limit' => PAGINATION_LIMIT,
			'order' => array(
					"Suplier.status LIKE '1'"
			)
	);
/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->Suplier->recursive = 0;
            $supliers = $this->paginate();
            if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["Suplier.nombre LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["Suplier.direccion LIKE"]  = "%$search%"; 
			$conditions["conditions"]["OR"]["Suplier.ciudad LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["Suplier.telefono LIKE"]  	= "%$search%";
			$conditions["conditions"]["OR"]["Suplier.rfc LIKE"]  		= "%$search%"; 
			$supliers = $this->Suplier->find('all',$conditions);
            }
            $this->set('supliers',$supliers );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Suplier->id = $id;
		if (!$this->Suplier->exists()) {
			throw new NotFoundException(__('Invalid suplier'));
		}
		$this->set('suplier', $this->Suplier->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Suplier->create();
			if ($this->Suplier->save($this->request->data)) {
				$this->Session->setFlash(__('The suplier has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The suplier could not be saved. Please, try again.'));
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
		$this->Suplier->id = $id;
		if (!$this->Suplier->exists()) {
			throw new NotFoundException(__('Invalid suplier'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Suplier->save($this->request->data)) {
				$this->Session->setFlash(__('The suplier has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The suplier could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Suplier->read(null, $id);
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
	public function delete($id = null, $redirect = true) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Suplier->id = $id;
		if (!$this->Suplier->exists()) {
			throw new NotFoundException(__('Invalid suplier'));
		}
		if ($this->Suplier->delete()) {
			$this->Session->setFlash(__('Suplier deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Suplier was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        
        public function __searchSuplier($search){
		$conditions["conditions"]["OR"]["Suplier.nombre LIKE"]  	= "%$search%"; 
		$conditions["conditions"]["OR"]["Suplier.direccion LIKE"]  = "%$search%"; 
		$conditions["conditions"]["OR"]["Suplier.ciudad LIKE"]  	= "%$search%"; 
		$conditions["conditions"]["OR"]["Suplier.telefono LIKE"]  	= "%$search%";
		$conditions["conditions"]["OR"]["Suplier.rfc LIKE"]  		= "%$search%"; 
		$products = $this->Suplier->find('all',$conditions);
		return $products;
	}
	/**
	*
	*/
	public function searchJSON(){
		try{
			//var_dump($this->request->data);
			$this->Suplier->recursive = 0;
			$campo_busqueda = isset($this->request->data["Suplier"]["busqueda"])?
											$this->request->data["Suplier"]["busqueda"]:
											"";
			$body["data"] = $this->__searchSuplier($campo_busqueda);
		}catch(Exception $e){
			echo $e->getMessage();
		}
		return new CakeResponse(array('body' => json_encode($body)));
    }
}
