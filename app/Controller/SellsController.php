<?php
App::uses('AppController', 'Controller');
/**
 * Sells Controller
 *
 * @property Sell $Sell
 */
class SellsController extends AppController {

        public $uses = array("Sell","Product","SellProduct","Stock");
/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->Sell->recursive = 0;
            //$this->paginate = array("order"=>array("Sell.id"=>"desc"));        
            $sells      = null;
            $conditions = array();
            $conditions["conditions"]["AND"]["Sell.status "]     = "1"; 
            $conditions["order"]                                     = array("Sell.id"=>"desc");
             if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["Customer.nombre LIKE"]     = "%$search%"; 
			$conditions["conditions"]["OR"]["Customer.direccion LIKE"]  = "%$search%"; 
			$conditions["conditions"]["OR"]["Customer.ciudad LIKE"]     = "%$search%"; 
			$conditions["conditions"]["OR"]["Customer.telefono LIKE"]   = "%$search%";
			$conditions["conditions"]["OR"]["Customer.rfc LIKE"]        = "%$search%"; 
                        $conditions["conditions"]["OR"]["Sell.date >="]        = "$search"; 
                        
                        $conditions["order"]                                        = array("Sell.id"=>"desc");
                        $this->paginate = $conditions;
			$sells = $this->paginate('Sell');
            }else{
                
                //$this->paginate = array("order"=>array("Sell.id"=>"desc"));   
                $this->paginate = $conditions;   
                $sells = $this->paginate("Sell");
            }
            $this->set('sells', $sells);
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
                    $producto_id = $producto["id"];
                    if($producto_id){
                        unset ($producto["id"]);
                        $producto["product_id"]    = $producto_id;
                        $producto["sell_id"]        = $sell_id;
                        $array_regreso[]= array(
                                                "SellProduct"=>
                                                    $producto

                                                ); 
                    }
                }
            }
            return $array_regreso;
        }
    public function __decreaseStock($sell_id){
    	$this->Sell->id = $sell_id;
    	if($this->Sell->exists()){
    		$products = $this->Sell->SellProduct->findAllBySellId($sell_id);
    		foreach ($products as $product){
    			$row = $this->Stock->findByProductId($product["Product"]["id"]);
    			if($row){
    				$this->Stock->id = $row["Stock"]["id"];
    				$this->Stock->read();
    				if($this->Stock->exists()){
	    				$this->Stock->data["Stock"]["actual"]= ($this->Stock->data["Stock"]["actual"] - $product["SellProduct"]["cantidad"]);
	    				$this->Stock->Save();
    				}
    			}
    		}
    	}
    }
      
	public function add() {
		if ($this->request->is('post')) {
			$this->Sell->create();
                        //var_dump($this->request->data);
                        //debug($_REQUEST);
                        $this->request->data["Sell"]["date"] = date("Y-m-d H:i:s");
                        $this->request->data["Sell"]["status"] = '1';
                        if($this->Sell->validates()){
                            if ($this->Sell->save($this->request->data)){
                                //Debugger::dump($this->__getLastQuery());
                                $products = $this->__reorderProducts($this->request->data["Product"],
                                                                    $this->Sell->getLastInsertID());
                                
                                if($products){
                                    //debug($products);
                                    //$this->SellProduct->create();
                                    if($this->SellProduct->saveAll($products)){
                                        //Debugger::dump($this->__getLastQuery());
                                    	$this->__decreaseStock($this->Sell->getLastInsertID());
                                        $this->Session->setFlash(__('Venta completa salvada'));   
                                        
                                        $this->redirect(array('action' => 'index'));
                                    }else{
                                        $this->Session->setFlash(__('Problemas salvando la venta'));   
                                    }
                                }else{
                                    $this->Session->setFlash(__('The sell has been saved'));
                                    $this->redirect(array('action' => 'index'));
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
        
        public function delete($id = null, $redirect = true) {
            $dataSource = $this->Sell->getDataSource();
            try{
                $dataSource->begin();
                
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Sell->id = $id;
		if (!$this->Sell->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->__increaseStock() && parent::delete($id,false)){
                    $this->Session->setFlash(__('Venta eliminada'));
                    $dataSource->commit();
                    $this->redirect(array('action' => 'index'));
		}else{
                    $this->Session->setFlash(__('Problemas al eliminar la venta...'));
                    $dataSource->rollback();  
                    $this->redirect(array('action' => 'index'));
                }
            }catch(Exception $e){
                
                $this->Session->setFlash(__('No fue posible eliminar la venta'.$e->getMessage()));
                $dataSource->rollback();    
		$this->redirect(array('action' => 'index'));
                
            }
	}
        
        public function __increaseStock(){
            $retorno = true;
            if($this->Sell->exists()){
                $this->Sell->read();
                //Debugger::dump($this->Order->data);
                    $products = $this->Sell->data["SellProduct"];
                    foreach ($products as $product){
                            $row = $this->Stock->findByProductId($product["product_id"]);
                            if($row){
                                    $this->Stock->id = $row["Stock"]["id"];
                                    $this->Stock->read();
                                    if($this->Stock->exists()){
                                            $this->Stock->data["Stock"]["actual"]= ($this->Stock->data["Stock"]["actual"] + $product["cantidad"]);
                                            if(!$this->Stock->Save()){
                                                $retorno = false;
                                            }
                                    }
                            }
                    }
            }
            return $retorno;
        }
	
}
