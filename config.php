<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH  echo dirname(__FILE__);

define('version', '17.10');
define('logo', 'tiba');
define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/cheval/');//dirname($_SERVER['PHP_SELF']).
define('LIBS', 'libs/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'cheval');
define('DB_USER', 'root');
define('DB_PASS', '');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

define('ENVIRONMENT', 'development');
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':error_reporting(E_ALL);break;
        case 'testing':
		case 'production':error_reporting(0);break;	
        default:exit('The application environment is not set correctly.');
	}
}



	