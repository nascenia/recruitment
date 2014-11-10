<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\Mvc;

class Environment
{
    public static function detect()
    {
        if (file_exists('data/env.meta')) {
            return trim(file_get_contents('data/env.meta'));
        }

        return isset($_SERVER['APP_ENV']) ? $_SERVER['APP_ENV'] : Application::ENV_PROD;
    }
} 
