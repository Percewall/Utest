<?php

define('ROOT_PATH', realpath(dirname(__FILE__)) . '/');
//define('BASE_PATH', realpath(dirname(__FILE__)) . '/../');

// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

switch (APPLICATION_ENV) {
	default :
	case 'development':
		define('HOSTNAME', 'localhost');
		break;
}

defined('PROJECT_NAME') || define('PROJECT_NAME', 'UTests');
defined('DATA_PATH') || define('DATA_PATH', '/var/www/UTests/');
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));
defined('PROJECT') || define('PROJECT', 'Projects/' . PROJECT_NAME);
defined('CLASS_PATH') || define('CLASS_PATH', '/Classes/');

include_once APPLICATION_PATH . '/Base/Autoloader.php';


