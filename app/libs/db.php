<?php
namespace MVC\LIBS;

class DB{
    private static $_connection = null;
    private $_pdo;
    public $name,$args;

    public function __construct(){
        
        try{

            $this->_pdo = new \PDO('mysql:host='. DATABASE_HOST_NAME .';dbname=' . DATABASE_NAME,DATABASE_USER_NAME ,DATABASE_PASSWORD);

        
        } catch (\PDOException $e){

            die($e->getMessage());

        }
    }
    public function __call($name,$args){
        return call_user_func_array(array(&$this->_pdo,$name),$args);
    }

    public static function getInstance(){
        if(!isset(self::$_connection)){
            self::$_connection = new DB();
        } 
        return self::$_connection; 
    }
}