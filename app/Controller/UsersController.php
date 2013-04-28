<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		//$this->set('users', $this->paginate());
		$users = $this->paginate();
		if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["User.Username LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["User.Nombre LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["User.Email LIKE"]  	= "%$search%"; 
			$users = $this->User->find('all',$conditions);
		}
		$this->set('users', $users);
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function login(){
		$this->layout = null;
	}
	
	public function loginJSON(){
		
		$user = $this->request->data["login"];
		$pass = $this->request->data["pass"];
		$parametros = array("conditions"=>array("User.username"=>$user,"User.pass"=>$pass));
		$usuario = $this->User->find("first",$parametros);
		if($usuario){
			$body = array("valid"=>true,
					  "redirect"=>"sells/index");	
		}else{
			$body = array("valid"=>false,
						  "error"=>"Datos inválidos, por favor intente de nuevo");
		}
		
		return new CakeResponse(array("body"=>json_encode($body)));
	}
	
	
/**
 * home method
 *
 * @return void
 */
	public function home() {
		
	}

}
