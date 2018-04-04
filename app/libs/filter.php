<?php
namespace MVC\LIBS;

trait Filter{
    
    public function filterInt($input){
        return filter_var($input,FILTER_SANITIZE_NUMBER_INT);
    }
    public function filterFloat($input){
        return filter_var($input,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
    }
    public function filterString($input){
        return htmlentities(filter_var($input,FILTER_SANITIZE_SPECIAL_CHARS));
    }
}
