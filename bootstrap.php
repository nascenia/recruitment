<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

/**
 * Include composer autoloader.
 */
require 'vendor/autoload.php';

/**
 * Define an application wide environment constant.
 *
 * Possible values: prod, dev
 *
 * In production, all configuration and doctrine items are cached to the file system. In development, all items are
 * generated on the fly.
 *
 * Remember to clear the cache by running `bin/console r:c`
 */
define('APP_ENV', Nascenia\Zend\Mvc\Environment::detect());
