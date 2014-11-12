<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace NasRecAdmin;

class Module
{
    public function getConfig()
    {
        return include __DIR__ .'/../../config/module.config.php';
    }
} 
