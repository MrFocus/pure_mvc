<?php
return [
   'template' => [
        'wrapper_start'     => TEMPLATE_PATH . 'wrapperstart.php',
        'header'            => TEMPLATE_PATH . 'header.php',
        'nav'               => TEMPLATE_PATH . 'nav.php',
        ':view'             => ':action_view',
        'wrapper_end'       => TEMPLATE_PATH . 'wrapperend.php',
   ],
   'header_resources' => [
        'css' => [
            'normalize'     => CSS_PATH . 'normalize.css',
            'gicons'        => CSS_PATH . 'googleicons.css',
            'fawesome'      => CSS_PATH . 'fawsome.min.css',
            'mainar'        => CSS_PATH . 'mainar.css',
        ],
        'js' => [
            'modernizr'     => JS_PATH . 'modernizr-2.8.3.min.js'
        ]
   ],
   'footer_resources' => [
            'jquery'        => JS_PATH . 'vendor/jquery-1.12.0.min.js',
            'helper'        => JS_PATH . 'helper.js',
            'data_table'    => JS_PATH . 'datatablesar.js',
            'main'          => JS_PATH . 'main.js',
   ]             
];