<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    
    public $ruta_imagenes = "/files/product/imagen/";
    
	public function index() {
		$this->Product->recursive = 0;
		//$this->set('products', $this->paginate());
		$products = null;
                $conditions = array();
                $conditions["order"]                                     = array("Product.id"=>"desc");
		if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["Product.nombre LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["Product.descripcion LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["Product.precio LIKE"]  	= "%$search%";                         
			//$products = $this->Product->find('all',$conditions);
                        $this->paginate = $conditions;
			$products = $this->paginate('Product');
		}else{
                     $this->paginate = $conditions;   
                     $products = $this->paginate("Product");
                }
		$this->set('products', $products);
                $this->set('ruta_imagenes', $this->ruta_imagenes);
                $this->set('fondo', "rojo");
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Product->Category->find('list');
		$unities = $this->Product->Unity->find('list');
		$orders = $this->Product->Order->find('list');
		$sells = $this->Product->Sell->find('list');
		$this->set(compact('categories', 'unities', 'orders', 'sells'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                        if($this->request->data["Product"]["imagen"]["size"] == 0){
                             unset($this->request->data["Product"]["imagen"]);
                        }
                        //Debugger::dump($this->request->data);
                        
			if ($this->Product->saveAll($this->request->data)) {
                            $this->Session->setFlash(__('The product has been saved'));
			} else {
                            $this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
                        $this->redirect(array('action' => 'index'));
                        
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		$categories = $this->Product->Category->find('list');
		$unities = $this->Product->Unity->find('list');
		$orders = $this->Product->Order->find('list');
		$sells = $this->Product->Sell->find('list');
		$this->set(compact('categories', 'unities', 'orders', 'sells'));
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
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        public function __searchProduct($search){
            $conditions["conditions"]["OR"]["Product.nombre LIKE"]  	= "%$search%"; 
            $conditions["conditions"]["OR"]["Product.descripcion LIKE"]  	= "%$search%"; 
            $conditions["conditions"]["OR"]["Product.precio LIKE"]  	= "%$search%"; 
            $products = $this->Product->find('all',$conditions);
            return $products;
        }
        
        public function searchJSON(){
            try{
                //var_dump($this->request->data);
                $this->Product->recursive = 0;
                $campo_busqueda = isset($this->request->data["Product"]["busqueda"])?
                                                $this->request->data["Product"]["busqueda"]:
                                                "";
                $body["data"] = $this->__searchProduct($campo_busqueda);
            }catch(Exception $e){
                echo $e->getMessage();
            }
            return new CakeResponse(array('body' => json_encode($body)));
    }
        
	
}
