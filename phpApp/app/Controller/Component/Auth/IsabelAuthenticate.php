<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class IsabelAuthenticate extends BaseAuthenticate {
    
    const URL_CHECK_USER = "http://uakka468c67a.azul24.koding.io:8080/WebApplication3/LoginServlet?format=json";

    public function authenticate(CakeRequest $request, CakeResponse $response) {
        // Return an array of user if they could authenticate the user,
        // return false if not
        App::uses('HttpSocket', 'Network/Http');
        
        $httpSocket = new HttpSocket();
        $httpResponse = $httpSocket->post(self::URL_CHECK_USER, $request->data['User']);
        if ($httpResponse && $httpResponse->isOk()) {
            $jsonResponse = json_decode($httpResponse->body(), true);
            if (isset($jsonResponse['success']) && $jsonResponse['success'] == true) {
                return $jsonResponse['user'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
