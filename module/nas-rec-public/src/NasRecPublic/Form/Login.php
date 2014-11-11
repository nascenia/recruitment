<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRecPublic\Form;

use Nascenia\Zend\Form\Form;

class Login extends Form
{
    public function init()
    {
        $this->add(array(
            'type' => 'email',
            'name' => 'email',

            'options' => array(
                'label' => 'Email',
            ),

            'attributes' => array(
                'size' => 32,
            ),
        ));

        $this->add(array(
            'type' => 'password',
            'name' => 'password',

            'options' => array(
                'label' => 'Password',
            ),

            'attributes' => array(
            ),
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',

            'options' => array(
            ),

            'attributes' => array(
                'value' => 'Log-in'
            ),
        ));
    }
} 
