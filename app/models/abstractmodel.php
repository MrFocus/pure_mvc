<?php 
namespace MVC\MODELS;

use MVC\LIBS\DB;

class AbstractModel extends DB{

    // protected static $_db;
    // protected static $stmt;

    // public function __construct(){
    //     self::$_db = DB::getInstance();
    // }

    const DATA_TYPE_BOOL    = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR     = \PDO::PARAM_STR;
    const DATA_TYPE_INT     = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;

    private function bindingValues(\PDOStatement &$stmt) {
        foreach(static::$tableSchema as $table => $type){
            if($type == 4){
                $sanitizedDecimal = filter_var($this->$table,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$table}",$sanitizedDecimal);
            }  else{
                 $stmt->bindValue(":{$table}",$this->$table,$type);
            }
        }
    }
    // public static function SQLPrepare($sql){
    //     self::$stmt = DB::getInstance()->prepare($sql);
    //     return self::$stmt->execute() ? true : false;
    // }
    private function setTableNames(){
        $columnNames = '';
        foreach(static::$tableSchema as $table => $type){
            $columnNames .= $table . "=:{$table},";
        }
        return trim($columnNames,',');
    }

// CREATE
    public function create(){
        $keys = array_keys(static::$tableSchema);
        
        // $sql = 'INESRT INTO employees(name,age,address,tax,salary) VALUES(:name,:age,:address,:tax,:salary)';
        $sql = 'INSERT INTO ' . static::$tableName .'(' . implode(',',$keys) . ') VALUES(:' . implode(',:',$keys) .')';
        $stmt = DB::getInstance()->prepare($sql);
        $this->bindingValues($stmt);
        return $stmt->execute() ? true : false;
    } 

//  UPDATE :
    public function update(){

        $sql = 'UPDATE employees SET '. self::setTableNames() .' WHERE ' . static::$primaryKey . '=' . $this->{static::$primaryKey}; 
        $stmt = DB::getInstance()->prepare($sql);
        $this->bindingValues($stmt);
        $stmt->execute();
        echo $sql;
        return $stmt->execute() ? true : false;

    }
// SAVE : 
    public function save(){
        return $this->{static::$primaryKey} == null ? $this->create() : $this->update();
    }
    
// DELETE :
    public static function delete($pk){

        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . '=' .   $pk; 
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->execute() ? true : false;
    
    }

// GET_ALL :
    public static function getAll(){
        $sql = 'SELECT * FROM ' . static::$tableName;

        // $stmt = self::$_db->prepare($sql);
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        if($stmt->execute() == true && $stmt->rowCount() > 0){
            $employees = $stmt->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema));
            return $employees;
        } else{
            return false;
        }
    }

// GET_BY_PK :
    public static function getByPK($pk){

        $sql = 'SELECT * FROM ' . static::$tableName .' WHERE ' . static::$primaryKey . '=' . $pk;
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        if($stmt->execute() == true && $stmt->rowCount() > 0){
            $employees = $stmt->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, get_called_class(),array_keys(static::$tableSchema));
            return array_shift($employees);
        } else {
            return false;
        }   
    }


}