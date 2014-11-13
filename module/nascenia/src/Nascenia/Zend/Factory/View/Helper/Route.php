<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-13
 * @version 2014-11-13
 */

namespace Nascenia\Zend\Factory\View\Helper;

use Nascenia\Zend\View\Helper;
use RdnFactory\AbstractFactory;

class Route extends AbstractFactory
{
    protected function create()
    {
        $event = $this->service('Application')->getMvcEvent();
        return new Helper\Route($event);
    }
}
