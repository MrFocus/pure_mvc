<?php

namespace MVC;
session_start();


require_once "app/config.php";

use MVC\LIBS\FrontController;


$url = new FrontController();

// print_r( $url->getURL());
// echo "<pre>";
$url->disPatch();
// echo "</pre>";
// phpinfo();