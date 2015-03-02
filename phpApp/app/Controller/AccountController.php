<?php
App::uses('AppController', 'Controller');

class AccountController extends AppController {

    /*********************************************************************
     *              CONTROLLER DATA MEMBERS
     *********************************************************************/

    public $name = "Account";    //name of the controller. Usually this is just the plural form of the primary model the controller uses
    // public $uses = array('MiModelo', "Modelo2");        //Allows a controller to access additional models. name of the current controller’s model must also be included if uses is present
    // public $components = array("Component1", "Component2");     //make available packages of logic that are shared between controllers

    /*********************************************************************
     *              CONTROLLER CALLBACKS METHODS
     *********************************************************************/

    public function beforeFilter() {
        parent::beforeFilter();
        $publicActions = array('index', 'login', 'register', 'rememberPassword');
        $this->Auth->allow($publicActions);
        if ($this->Auth->loggedIn()) {
            if (in_array(strtolower($this->request->action), $publicActions)) {
                $this->redirect($this->Auth->loginRedirect);
            }
        } else {
            $this->layout = 'public-layout';
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
            if ($this->request->query('force') === 'true') {
                if ($this->Auth->login($this->request->data['User'])) {
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            else if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('Usuario y/o contraseña inválidos. Favor vuelva a intentar', $element = 'default', $params = array(), $key = 'auth');
        }
    }

    public function register() {
        
    }

    public function rememberPassword() {
        
    }

    public function settings() {

    }

    public function edit() {
        
    }

    public function changePassword() {

    }

}