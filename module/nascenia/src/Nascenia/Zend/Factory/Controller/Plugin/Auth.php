<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Factory\Controller\Plugin;

use Nascenia\Zend\Controller\Plugin;
use RdnFactory\AbstractFactory;

class Auth extends AbstractFactory
{
    protected function create()
    {
        return new Plugin\Auth($this->service('Nascenia\Authentication\Authentication'));
    }
}
