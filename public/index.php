<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

use Nascenia\Zend\Mvc\Application;

/**
 * Change the base directory to the project root directory.
 */
chdir(dirname(__DIR__));
/**
 * Include the bootstrap file that loads the autoloader and defines constants.
 */
require 'bootstrap.php';
/**
 * Initialize the application using the application wide configuration and run the app.
 */
return Application::init(require 'config/application.config.php')->run();
