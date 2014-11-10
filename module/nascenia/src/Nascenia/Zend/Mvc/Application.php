<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\Mvc;

use Zend\Mvc\Application as ZendApplication;

class Application extends ZendApplication
{
    const ENV_DEV = 'dev';
    const ENV_PROD = 'prod';

    public static function init($config = array())
    {
        $cacheEnabled = APP_ENV != self::ENV_DEV && PHP_SAPI != 'cli';
        $config = array_replace_recursive(array(
            'module_listener_options' => array(
                'module_paths' => array(
                    'module',
                    'vendor',
                ),

                // Autoload configuration options from the following paths.
                'config_glob_paths' => array(
                    'config/autoload/{,*.}{global,' . APP_ENV . ',local}.config.php',
                ),

                // Whether or not to enable a configuration cache.
                // If enabled, the merged configuration will be cached and used in
                // subsequent requests.
                'config_cache_enabled' => $cacheEnabled,
                // The key used to create the configuration cache file name.
                'config_cache_key' => 'cache',

                // Whether or not to enable a module class map cache.
                // If enabled, creates a module class map cache which will be used
                // by in future requests, to reduce the autoloading process.
                'module_map_cache_enabled' => $cacheEnabled,

                // The key used to create the class map cache file name.
                //'module_map_cache_key' => $stringKey,
                // The path in which to cache merged configuration.
                'cache_dir' => 'data/cache',
            ),
        ), $config);

        return parent::init($config);
    }
}
