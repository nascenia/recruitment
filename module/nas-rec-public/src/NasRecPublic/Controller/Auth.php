<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-13
 * @version 2014-11-13
 */

namespace NasRecPublic\Controller;

use NasRec\Authentication\Adapter;
use Zend\Session\Container;

class Auth extends AbstractController
{
    public function loginAction()
    {
        $form = $this->form('NasRecPublic:Login');

        if ($this->request->isPost() && $form->isValid($this->request->getPost())) {
            $data = $form->getData();

            $adapter = new Adapter\Simple($this->entity(), $data['email'], $data['password']);
            $result = $this->auth()->authenticate($adapter);

            if (!$result->isValid()) {
                $form->get('email')->setMessages($result->getMessages());
            } else {
                $session = new Container('NasRecPublic_Auth');
                return $this->redirect()->toUrl($session->url);
            }
        }

        return array(
            'form' => $form,
        );
    }
} 
