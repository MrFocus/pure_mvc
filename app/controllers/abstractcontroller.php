<?php
namespace MVC\CONTROLLERS;

use MVC\LIBS\FrontController;


class AbstractController {
protected $_controller,
          $_action,
          $_params,
          $_data = [];

    public function setController($controller){
        $this->_controller = $controller;
    }  
    public function setAction($action){
        $this->_action = $action;
    }
    public function setParams($params){
        $this->_params = $params;
    }        

    protected function _view(){
        
        if($this->_action == FrontController::NOT_FOUND_ACTION){
            require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';   

        } else{
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';

            if(file_exists($view)){
                extract($this->_data);
                require_once $view;
            } else{
                require_once VIEWS_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
    }
    public function NotFoundAction() {
        $this->_view();
    }
}