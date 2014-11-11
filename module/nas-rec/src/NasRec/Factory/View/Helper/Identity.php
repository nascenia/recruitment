<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRec\Factory\View\Helper;

use NasRec\View\Helper;
use RdnFactory\AbstractFactory;

class Identity extends AbstractFactory
{
    protected function create()
    {
        return new Helper\Identity($this->service('NasRec\Authentication\Identity\IdentityProvider'));
    }
}
