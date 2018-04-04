<?php
namespace MVC\LIBS;
use MVC\CONTROLLERS\AbstractController;

class FrontController {

    const NOT_FOUND_CONTROLLER  = 'MVC\CONTROLLERS\\NotFoundController';
    const NOT_FOUND_ACTION      = 'NotFoundAction';
    private 
        $_controller = 'index',
        $_action     = 'default',
        $_params     = array();
    public function __construct(){
        $this->parseURL();
    }
    private function parseURL(){
        $url = explode("/",trim(str_replace("mvc","",parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)),"/"),3);
        if(!empty($url[0])){
            $this->_controller = $url[0];
        }
        if(!empty($url[1])){
            $this->_action = $url[1];
        }
        if(!empty($url[2])){
            $this->_params = explode("/",$url[2]);
        }
    }    
    public function disPatch(){
        $controllerClassName = "MVC\CONTROLLERS\\" .  ucfirst($this->_controller) . "Controller";
        $actionName = $this->_action ."Action";
        if(!class_exists($controllerClassName)){
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if(!method_exists($controller,$actionName)){
            $actionName = $this->_action = self::NOT_FOUND_ACTION;
        }

        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$actionName();   // executing method in URL     
    }
}