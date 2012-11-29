<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    /*
    public $helpers = array(
        'Form' => array('className' => 'MySqlEnumForm'),
    );
    */
    /*
    public function beforeRender() { 
        foreach($this->modelNames as $model) { 
          foreach($this->$model->_schema as $var => $field) { 
            if(strpos($field['type'], 'enum') === FALSE) 
              continue; 

            preg_match_all("/\'([^\']+)\'/", $field['type'], $strEnum); 

            if(is_array($strEnum[1])) { 
              $varName = Inflector::camelize(Inflector::pluralize($var)); 
              $varName[0] = strtolower($varName[0]); 
              $this->set($varName, array_combine($strEnum[1], $strEnum[1])); 
            } 
          } 
        } 
    } 
    */
    public function delete($id = null) {
        
            if (!$this->request->is('post')) {
                    throw new MethodNotAllowedException();
            }
            //var_dump($this->uses);
            if(!empty($this->uses)){
                $this->loadModel($this->uses[0]);
                $modelo = $this->uses[0];
                $modelo = $this->$modelo;
                $modelo->id = $id;
                $this->request->data = $modelo->read();
                $this->request->data[$this->uses[0]]["status"] = "0";
                if (!$modelo->exists()) {
                    throw new NotFoundException(__('Registro inválido'));
                }
                
                //var_dump($this->request->data);
                //exit(1);
                if ($modelo->save($this->request->data)){
                    $this->Session->setFlash(__('Registro eliminado'));
                    $this->redirect(array('action' => 'index'));
                }

            }
            $this->Session->setFlash(__('El registro no fue eliminado'));
            $this->redirect(array('action' => 'index'));
                     
                     
    }
}
