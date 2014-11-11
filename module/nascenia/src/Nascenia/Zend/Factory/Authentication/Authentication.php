<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Factory\Authentication;

use Nascenia\Zend\Authentication\Adapter\Nascenia;
use Nascenia\Zend\Authentication\Authentication as AuthenticationService;
use RdnFactory\AbstractFactory;

class Authentication extends AbstractFactory
{
    protected function create()
    {
        return new AuthenticationService;
    }
}
