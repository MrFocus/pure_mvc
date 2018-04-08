<?php
namespace MVC\CONTROLLERS;

use MVC\LIBS\FrontController;


class AbstractController {
protected $_controller,
          $_action,
          $_params,
          $_data = [],
          $_template;

    public function setController($controller){
        $this->_controller = $controller;
    }  
    public function setAction($action){
        $this->_action = $action;
    }
    public function setParams($params){
        $this->_params = $params;
    }   
    public function setTemplate($template){
        $this->_template = $template;
    } 
    public function setLanguage($language){
        $this->_language = $language;
    }        

    protected function _view(){
        
        if($this->_action == FrontController::NOT_FOUND_ACTION){
            require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';   

        } else{
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';

            if(file_exists($view)){
                $this->_data = array_merge($this->_data,$this->_language->getDictionary());
                $this->_template->setActionViewFile($view);
                $this->_template->setTemplateData($this->_data);
                $this->_template->renderApp();
                // echo "<pre>";
                // var_dump($this->_data);
                // echo "</pre>";
                
                


            } else{
                require_once VIEWS_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
    }
    public function NotFoundAction() {
        $this->_view();
    }
}