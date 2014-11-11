<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Factory\Controller\Plugin;

use Nascenia\Zend\Controller\Plugin;
use RdnFactory\AbstractFactory;

class Form extends AbstractFactory
{
    protected function create()
    {
        return new Plugin\Form($this->service('FormElementManager'));
    }
}
