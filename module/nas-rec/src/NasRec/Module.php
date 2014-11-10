<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec;

class Module
{
    public function getConfig()
    {
        return include __DIR__ .'/../../config/module.config.php';
    }
} 
