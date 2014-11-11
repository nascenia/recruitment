<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Form;

use Zend\Form\Form as ZendForm;

class Form extends ZendForm
{
    public function isValid($data = null)
    {
        if (func_num_args() > 0) {
            $this->setData($data);
        }

        return parent::isValid();
    }
} 
