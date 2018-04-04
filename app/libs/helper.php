<?php
namespace MVC\LIBS;

trait Helper {
    public function redirect($path){
        session_write_close();
        header("location: ". $path);
        exit();
    }
}