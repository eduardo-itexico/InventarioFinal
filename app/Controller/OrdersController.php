<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

     public $uses = array("Product","OrderProduct","Stock","Order");
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Order->recursive = 0;
                $this->paginate = array("order"=>array("Order.id"=>"desc"));
		$this->set('orders', $this->paginate("Order"));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->set('order', $this->Order->read(null, $id));
	}
        
        public function __add2Products($order_id){
            $this->Order->id = $order_id;
            $this->Order->read();
            //Debugger::dump($this->Order->data);
            $productos = $this->Order->data["OrderProduct"];
            if($productos){
                foreach ($productos as $producto) {
                    $cantidad = $producto["cantidad"];
                    $row = $this->Stock->findByProductId($producto["product_id"]);
                    if($row){
                        $this->Stock->id = $row["Stock"]["id"];
                        $this->Stock->read();
                        if($this->Stock->exists()){
                            $this->Stock->data["Stock"]["actual"]= ($this->Stock->data["Stock"]["actual"] + $producto["cantidad"]);
                            $this->Stock->Save();
    			}
                    }
                    
                }
               
            }
            //var_dump($this->Order->data);
        }
        
        public function __addOrderId($products,$order_id){
            if($products){
                foreach ($products as &$producto) {
                    $producto["order_id"] = $order_id;
                }
            }
            return $products;
        }
        

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
                        $this->request->data["Order"]["date"] = date("Y-m-d H:i:s");
			if ($this->Order->validates()) {
                            if($this->Order->save($this->request->data)){                                                                  
                                $this->__add2Products($this->Order->id);
                                $this->Session->setFlash(__('Orden completa salvada'));   
                                $this->redirect(array('action' => 'index'));
  
                                 
                            }else{
                                 $this->Session->setFlash(__('Problemas salvando la venta'));   
                            }
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$supliers = $this->Order->Suplier->find('list');
		$products = $this->Order->Product->find('list');
		$this->set(compact('supliers', 'products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
		$supliers = $this->Order->Suplier->find('list');
		$products = $this->Order->Product->find('list');
		$this->set(compact('supliers', 'products'));
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
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->__decreaseStock() && $this->Order->delete()) {
                    $this->Session->setFlash(__('Orden eliminada'));
                    $this->redirect(array('action' => 'index'));
		}else{
                    $this->Session->setFlash(__('Problemas al eliminar la orden...'));
                    $this->redirect(array('action' => 'index'));
                }
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function __decreaseStock(){
            $retorno = true;
            if($this->Order->exists()){
                $this->Order->read();
                //Debugger::dump($this->Order->data);
                    $products = $this->Order->data["OrderProduct"];
                    foreach ($products as $product){
                            $row = $this->Stock->findByProductId($product["product_id"]);
                            if($row){
                                    $this->Stock->id = $row["Stock"]["id"];
                                    $this->Stock->read();
                                    if($this->Stock->exists()){
                                            $this->Stock->data["Stock"]["actual"]= ($this->Stock->data["Stock"]["actual"] - $product["cantidad"]);
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
