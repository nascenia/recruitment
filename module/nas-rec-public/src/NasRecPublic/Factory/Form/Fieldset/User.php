<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace NasRecPublic\Factory\Form\Fieldset;

use NasRecPublic\Form\Fieldset;
use RdnFactory\AbstractFactory;

class User extends AbstractFactory
{
    protected function create()
    {
        return new Fieldset\User($this->entity('NasRec:User'));
    }
}
