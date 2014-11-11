<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Hydrator;

use Zend\Stdlib\Hydrator\ClassMethods;

class Entity extends ClassMethods
{
    public function __construct()
    {
        parent::__construct(false);
    }
} 
