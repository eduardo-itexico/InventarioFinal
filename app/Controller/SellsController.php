<?php
App::uses('AppController', 'Controller');
/**
 * Sells Controller
 *
 * @property Sell $Sell
 */
class SellsController extends AppController {

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

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sell->create();
			if ($this->Sell->save($this->request->data)) {
				$this->Session->setFlash(__('The sell has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sell could not be saved. Please, try again.'));
			}
		}
		$customers = $this->Sell->Customer->find('list');
		$users = $this->Sell->User->find('list');
		$products = $this->Sell->Product->find('list');
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
