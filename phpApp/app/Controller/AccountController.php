<?php
/**
 * The MIT License (MIT)
 * 
 * Copyright (c) 2015 
 * 
 * John Congote <jcongote@gmail.com>
 * Felipe Calad
 * Isabel Lozano
 * Juan Diego Perez
 * Joinner Ovalle
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

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
        $publicActions = array('index', 'login', 'loginGuest', 'register', 'rememberPassword');
        $this->Auth->allow($publicActions);
        if ($this->Auth->loggedIn()) {
            if (in_array(strtolower($this->request->action), $publicActions) && strtolower($this->request->action) !== 'register') {
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
            $loginUrl = Configure::read('Database.loginUrl');

            if (!$this->_checkDatabase($loginUrl, 'POST')) {
                $this->Session->setFlash('Lo sentimos!!! El servicio para validar los usuarios no se encuentra disponible');
            } else {
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                }
                $this->Session->setFlash('Usuario y/o contraseña inválidos. Favor vuelva a intentar', $element = 'default', $params = array(), $key = 'auth');
            }
        }
    }

    public function loginGuest() {
        if ($this->request->is('post')) {
            $this->request->data['User']['guest'] = true;
            $this->Auth->login($this->request->data['User']);
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    public function register() {
        if ($this->request->is('post')) {
            $registerUrl = Configure::read('Database.registerUrl');

            if (!$this->_checkDatabase($registerUrl, 'POST')) {
                $this->Session->setFlash('Lo sentimos!!! El servicio para registrar nuevos usuarios no se encuentra disponible');
            } else {
                $user = $this->request->data['User'];
                $user['userpass'] = $user['password'];
                $user['nickname'] = $user['alias'];

                App::uses('HttpSocket', 'Network/Http');
        
                $httpSocket = new HttpSocket();
                $httpResponse = $httpSocket->post($registerUrl, $user);
                if ($httpResponse && $httpResponse->isOk()) {
                    $jsonResponse = json_decode($httpResponse->body(), true);
                    if (isset($jsonResponse['success']) && $jsonResponse['success'] == true) {
                        $this->Auth->login($this->request->data['User']);
                        return $this->redirect($this->Auth->redirectUrl());
                    } else {
                        $this->Session->setFlash($jsonResponse['message']);
                    }
                } else {
                    $this->Session->setFlash('Hay un problema en el servicio para registrar nuevos usuarios');
                }                
            }
        }
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