<?php

namespace MVC;
session_start();

require_once "../app/config/config.php";

use MVC\LIBS\FrontController;
use MVC\LIBS\Template;
use MVC\LIBS\Language;

$template_parts  = require_once "../app/config/templateconfig.php";
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = DEFAULT_APP_LANGUAGE;
}
$template = new Template($template_parts);
$language = new Language();
$url = new FrontController($template,$language);
// echo "<pre>";
// var_dump($template);
// echo "</pre>";

$url->disPatch();
