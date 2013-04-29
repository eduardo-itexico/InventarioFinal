<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 1;
		//$this->set('categories', $this->paginate());
		$categories = $this->paginate();
		if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["Category.name LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["ParentCategory.name LIKE"]  	= "%$search%"; 
			$categories = $this->Category->find('all',$conditions);
		}
		$this->set('categories', $categories);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			//var_dump($this->request->data);
			//$this->request->data["Category"]["status"] = "1";
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Category->ParentCategory->find('list');
		$this->set(compact('categories'));
	}
	
	
	/**
 * addSubcategory method
 *
 * @return void
 */
	public function addSubcategory() {
		if ($this->request->is('post')) {
			$this->Category->create();
			//var_dump($this->request->data);
			//$this->request->data["Category"]["status"] = "1";
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Category->ParentCategory->find('list');
		$this->set(compact('categories'));
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
		}
		$categories = $this->Category->Category->find('list');
		$this->set(compact('categories'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Category deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Category was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
