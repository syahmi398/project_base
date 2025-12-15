<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


switch (ENVIRONMENT)
{
    case 'development':
        $db['default']['hostname'] = 'localhost';
        $db['default']['username'] = 'root';
        $db['default']['password'] = ''; 
        $db['default']['database'] = 'test';
        $db['default']['db_debug'] = TRUE;
        $db['default']['stricton'] = TRUE; 
        break;

    case 'testing':
        $db['default']['hostname'] = 'testing.database.host';
        $db['default']['username'] = 'test_user';
        $db['default']['password'] = 'test_pass';
        $db['default']['database'] = 'test';
        $db['default']['db_debug'] = FALSE;
        break;
    case 'production':
    default:
        $db['default']['hostname'] = '198.168.100.222';
        $db['default']['username'] = 'test';        
        $db['default']['password'] = 'test';
        $db['default']['database'] = 'test';   
		$db['default']['db_debug'] = FALSE;
		$db['default']['save_queries'] = FALSE;
        break;
}
