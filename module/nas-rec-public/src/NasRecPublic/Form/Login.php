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
                'pre_addon' => '<i class="fa fa-user"></i>',
            ),

            'attributes' => array(
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Email',
                'size' => 32,
            ),
        ));

        $this->add(array(
            'type' => 'password',
            'name' => 'password',

            'options' => array(
                'pre_addon' => '<i class="fa fa-key"></i>',
            ),

            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Password',
            ),
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',

            'options' => array(
            ),

            'attributes' => array(
                'class' => 'btn btn-primary',
                'value' => 'Log-in'
            ),
        ));
    }
} 
