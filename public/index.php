<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create Roles and Resources
//require_once 'Zend/Acl.php';
//require_once 'Zend/Acl/Role.php';
require_once 'Zend/Layout.php';

/*Zend_Layout::startMvc(array(
    'layoutPath' => APPLICATION_PATH . '/layouts',
    'layout' => 'layoutO'
));*/

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

require_once 'Zend/Loader.php';

$application->bootstrap()
            ->run();