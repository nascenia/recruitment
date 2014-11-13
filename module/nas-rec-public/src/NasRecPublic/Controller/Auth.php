<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-13
 * @version 2014-11-13
 */

namespace NasRecPublic\Controller;

class Auth extends AbstractController
{
    public function loginAction()
    {
        $form = $this->form('NasRecPublic:Login');

        return array(
            'form' => $form,
        );
    }
} 
