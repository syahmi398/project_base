<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$di = new RecursiveDirectoryIterator(APPPATH . 'route');
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if (strpos($filename, '.php') !== false) {
        require_once $filename;
    }
}