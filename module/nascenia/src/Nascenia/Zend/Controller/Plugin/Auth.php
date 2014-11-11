<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Auth extends AbstractPlugin
{
    protected $auth;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function __invoke()
    {
        return $this->auth;
    }
} 
