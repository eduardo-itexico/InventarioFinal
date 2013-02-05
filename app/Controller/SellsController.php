<?php
App::uses('AppController', 'Controller');
/**
 * Sells Controller
 *
 * @property Sell $Sell
 */
class SellsController extends AppController {

        public $uses = array("Product","Sell","SellProduct");
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sell->recursive = 0;
		$this->set('sells', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Sell->id = $id;
		if (!$this->Sell->exists()) {
			throw new NotFoundException(__('Invalid sell'));
		}
		$this->set('sell', $this->Sell->read(null, $id));
	}
        public function __getLastQuery() {
          $dbo = $this->Sell->getDatasource();
          $logs = $dbo->getLog();
          $lastLog = end($logs['log']);
          return $lastLog['query'];
        }
/**
 * add method
 *
 * @return void
 */
        public function __reorderProducts($productos,$sell_id){
            $array_regreso = null;
            if($productos){
                foreach ($productos as &$producto){
                    $producto_id = $producto["id"] ? $producto["id"] :"5";
                    unset ($producto["id"]);
                    $producto["product_id"]    = $producto_id;
                    $producto["sell_id"]        = $sell_id;
                    $array_regreso[]= array(
                                            "SellProduct"=>
                                                $producto
                        
                                            ); 
                }
            }
            return $array_regreso;
        }
      
	public function add() {
		if ($this->request->is('post')) {
			$this->Sell->create();
                        //var_dump($this->request->data);
                        $this->request->data["Sell"]["date"] = date("Y-m-d H:i:s");
                        if($this->Sell->validates()){
                            if ($this->Sell->save($this->request->data)){
                                
                                $products = $this->__reorderProducts($this->request->data["Product"],
                                                                    $this->Sell->getLastInsertID());
                                
                                if($products){
                                    //debug($products);
                                    //$this->SellProduct->create();
                                    if($this->SellProduct->saveAll($products)){
                                        $this->Session->setFlash(__('Venta completa salvada'));   
                                    }else{
                                        $this->Session->setFlash(__('Problemas salvando la venta'));   
                                    }
                                }else{
                                    $this->Session->setFlash(__('The sell has been saved'));
                                }
                                 //$this->Session->setFlash(__('The sell has been saved'));
				//$this->redirect(array('action' => 'index'));
                            } else {
                                $this->Session->setFlash(__('The sell could not be saved. Please, try again.'));
                                //var_dump($this->__getLastQuery());    
                            }
                        }else{
                            $this->Session->setFlash(__('Erorres de validacion') .print_r($this->Sell->invalidFields()));
                            
                        }
			
		}
                //debug($this->Sell);
		$customers = $this->Sell->Customer->find('list');
		$users = $this->Sell->User->find('list');
		$products = $this->Product->find('list');
		$this->set(compact('customers', 'users', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Sell->id = $id;
		if (!$this->Sell->exists()) {
			throw new NotFoundException(__('Invalid sell'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sell->save($this->request->data)) {
				$this->Session->setFlash(__('The sell has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sell could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Sell->read(null, $id);
		}
		$customers = $this->Sell->Customer->find('list');
		$users = $this->Sell->User->find('list');
		$products = $this->Sell->Product->find('list');
		$this->set(compact('customers', 'users', 'products'));
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
		$this->Sell->id = $id;
		if (!$this->Sell->exists()) {
			throw new NotFoundException(__('Invalid sell'));
		}
		if ($this->Sell->delete()) {
			$this->Session->setFlash(__('Sell deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sell was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
}
