<?php
namespace MVC\LIBS;
class Language {
    private $_dictionary = array();
    public function load($path){

        if(isset($_SESSION['lang'])){
            $defaultLanguage = $_SESSION['lang'];
        }else{
            $defaultLanguage = DEFAULT_APP_LANGUAGE;
        }
        $path = $path . ".lang.php";
        $languageFile = LANGUAGE_PATH . DS . $defaultLanguage .DS . $path;
        if(file_exists($languageFile)){
            require_once $languageFile;
            if(is_array($_) && !empty($_)){
                foreach ($_ as $key => $value) {
                    $this->_dictionary[$key] = $value;
                }
            }
        }else{
            trigger_error("the language file doen't exists");
        }
    }
    public function getDictionary(){
        return $this->_dictionary;
    }
}