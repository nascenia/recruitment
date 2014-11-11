<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRecPublic\Factory\Form;

use NasRecPublic\Form;
use RdnFactory\AbstractFactory;

class Application extends AbstractFactory
{
    protected function create()
    {
        return new Form\Application($this->service('RdnUpload\Container'));
    }
}
