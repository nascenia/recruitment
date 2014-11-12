<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace NasRecPublic\Factory\Form\Fieldset;

use NasRecPublic\Form\Fieldset;
use RdnFactory\AbstractFactory;

class Position extends AbstractFactory
{
    protected function create()
    {
        return new Fieldset\Position($this->entity('NasRec:Position'));
    }
}
