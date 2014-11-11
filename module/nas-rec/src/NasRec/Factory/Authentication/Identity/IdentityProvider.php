<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRec\Factory\Authentication\Identity;

use NasRec\Authentication\Identity;
use RdnFactory\AbstractFactory;

class IdentityProvider extends AbstractFactory
{
    protected function create()
    {
        return new Identity\IdentityProvider($this->service('Nascenia\Authentication\Authentication'));
    }
}
