<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $uses = array("User");
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		//$this->set('users', $this->paginate());
		$users      = null;
                $conditions = array();
                $conditions["conditions"]["AND"]["User.status LIKE "] = '1'; 
                $conditions["order"]                                     = array("User.id"=>"desc");
		if ($this->request->is('post')) {
			$search = $this->request->data["simple-search"];
			$conditions["conditions"]["OR"]["User.Username LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["User.Nombre LIKE"]  	= "%$search%"; 
			$conditions["conditions"]["OR"]["User.Email LIKE"]  	= "%$search%"; 
			$users = $this->User->find('all',$conditions);
		}else{
                
                //$this->paginate = array("order"=>array("Sell.id"=>"desc"));   
                $this->paginate = $conditions;   
                $users = $this->paginate("User");
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
                        $continue = true;
                        //$this->request->data["User"]["status"] = "1";
                        $password = $this->request->data["User"]["pass"];
                        $repeated = $this->request->data["User"]["repeat"];
                        
                        if(!$password){
                            unset($this->request->data["User"]["pass"]); 
                        }else{
                            if($password != $repeated){
                                $continue = false;
                            }
                        }
                        unset($this->request->data["User"]["repeat"]);
                       /*
                        Debugger::dump($this->request->data);
                        $this->User->save($this->request->data);
                        Debugger::dump($this->User->getLastQuery());
                        exit(1);
                        */
                        if($continue){
                            if ( $this->User->save($this->request->data)) {
                                    $this->Session->setFlash(__('The user has been saved'));
                                    $this->redirect(array('action' => 'index'));
                            } else {
                                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                            }
                        }else{
                            $this->Session->setFlash(__('Los password no coinciden'));
                            $this->redirect(array('action' => 'index'));
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
        
	public function delete($id = null, $redirect = true) {
            parent::delete($id);
            
               /*
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
            */
        
	}
	
	
	/*
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
	*/
        public function login() {
            $this->layout = null;
            $this->Auth->logout();
            if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    //$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
                    $this->Session->setFlash(__('Credenciales inválidas, inténtalo de nuevo'));
                }
            }
        }
        
        
        public function logout() {
            $this->redirect($this->Auth->logout());
        }
	
/**
 * home method
 *
 * @return void
 */
	public function home() {
		
	}

}
