<?php

define("DS",DIRECTORY_SEPARATOR);
define("APP_PATH",__DIR__ . DS . "..");

define('VIEWS_PATH', APP_PATH . DS .'views' . DS);
define('TEMPLATE_PATH', APP_PATH . DS .'template' . DS);
define('CSS_PATH','/css' . DS);
define('JS_PATH','/js' . DS);
define('LANGUAGE_PATH',APP_PATH . DS .'languages');

defined('DATABASE_HOST_NAME')       ? null : define('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')       ? null : define('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define('DATABASE_PASSWORD', '');
defined('DATABASE_NAME')            ? null : define('DATABASE_NAME', 'abstract');
defined('DEFAULT_APP_LANGUAGE')     ? null : define('DEFAULT_APP_LANGUAGE', 'en');

require_once APP_PATH . DS. "libs" . DS . "autoload.php";