<?php

define("DS",DIRECTORY_SEPARATOR);
define("APP_PATH",__DIR__);
define('VIEWS_PATH', APP_PATH . DS .'views' . DS);

defined('DATABASE_HOST_NAME')   ? null : define('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')   ? null : define('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')    ? null : define('DATABASE_PASSWORD', '');
defined('DATABASE_NAME')        ? null : define('DATABASE_NAME', 'abstract');

require_once "libs" . DS . "autoload.php";