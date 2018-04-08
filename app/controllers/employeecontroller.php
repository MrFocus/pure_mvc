<?php

namespace MVC\CONTROLLERS;
use MVC\LIBS\Filter;
use MVC\LIBS\Helper;
use MVC\MODELS\EmployeeModel;


class EmployeeController extends AbstractController{

    use Filter,Helper;
    
// DefaultAdcton .. 
    public function defaultAction(){
        $this->_language->load('employee/default');
        $this->_data['employees'] = EmployeeModel::getAll();
        $this->_view();
        
    }

//AddAction ..
    public function addAction(){
        $this->_language->load('employee/add');

        if(isset($_POST['submit'])){
            $employee = new EmployeeModel();

            $employee->name     = $this->filterString($_POST['name']);
            $employee->age      = $this->filterInt($_POST['age']);
            $employee->address  = $this->filterString($_POST['address']);
            $employee->tax      = $this->filterFloat($_POST['tax']);
            $employee->salary   = $this->filterFloat($_POST['salary']);

            if($employee->save()){
                $_SESSION['employee'] = 'Employee added successfully';
                $this->redirect('/mvc/employee');
            }
        }
        $this->_view(); 
    }

// EditAction ..    
    public function editAction(){
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeeModel::getByPK($id);
        if($emp == null){
            $_SESSION['employee'] = 'Employee NOT found';
            $this->redirect('/mvc/employee');    
        }
        $this->_data['employee'] = $emp;
        if(isset($_POST['submit'])){
            $emp->name     = $this->filterString($_POST['name']);
            $emp->age      = $this->filterInt($_POST['age']);
            $emp->address  = $this->filterString($_POST['address']);
            $emp->tax      = $this->filterFloat($_POST['tax']);
            $emp->salary   = $this->filterFloat($_POST['salary']);

            if($emp->save()){
                $_SESSION['employee'] = 'Employee Edited successfully';
                $this->redirect('/mvc/employee');
            } 
        }
        $this->_view(); 
    }

// DeleteAction ..
    public function deleteAction(){
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeeModel::getByPK($id);
        if($emp == null){
            $_SESSION['employee'] = 'Employee NOT found';
            $this->redirect('/mvc/employee');    
        }
        if($emp->delete($id)){
            $_SESSION['employee'] = 'Employee Deleted successfully';
            $this->redirect('/mvc/employee');
        } 
        $this->_view(); 
    }
}