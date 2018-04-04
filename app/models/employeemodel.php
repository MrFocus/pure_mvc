<?php
namespace MVC\MODELS;

// use MVC\MODELS\AbstractModel;

class EmployeeModel extends AbstractModel {
    public $id;
    public $name;
    public $age;
    public $address;
    public $tax;
    public $salary;

    public static $tableName = 'employees';
    public static $primaryKey = 'id';
    public static $tableSchema = array(
        'name'       => self::DATA_TYPE_STR,
        'age'        => self::DATA_TYPE_INT,
        'address'    => self::DATA_TYPE_STR,
        'tax'        => self::DATA_TYPE_DECIMAL,
        'salary'     => self::DATA_TYPE_DECIMAL,
    );

    // public function __construct($name,$age,$address,$tax,$salary) {
    //     $this->name      = $name;
    //     $this->age       = $age;
    //     $this->address   = $address;
    //     $this->tax       = $tax;
    //     $this->salary   = $salary;
    // }
}