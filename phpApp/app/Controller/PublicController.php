<?php
App::uses('AppController', 'Controller');

class PublicController extends AppController {

    /*********************************************************************
     *              CONTROLLER DATA MEMBERS
     *********************************************************************/

    public $name = "Public";    //name of the controller. Usually this is just the plural form of the primary model the controller uses
    // public $uses = array('MiModelo', "Modelo2");        //Allows a controller to access additional models. name of the current controller’s model must also be included if uses is present
    // public $components = array("Component1", "Component2");     //make available packages of logic that are shared between controllers

    /*********************************************************************
     *              CONTROLLER CALLBACKS METHODS
     *********************************************************************/

    public function beforeFilter() {
        $this->layout = 'public-layout';
        $this->Auth->allow();
        if ($this->Auth->loggedIn()) {
            $this->redirect($this->Auth->loginRedirect);
        }
    }

    // public function afterFilter() {
        
    // }

    // public function beforeRender() {

    // }

    /*********************************************************************
     *              CONTROLLER METHODS (ACTIONS)
     *********************************************************************/
    public function index() {
        return $this->redirect(array('action' => 'login'));
    }


    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login($this->request->data['User'])) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('Usuario y/o contraseña inválidos. Favor vuelva a intentar');
        }
    }

    public function register() {
        
    }

    public function rememberPassword() {
        
    }

}