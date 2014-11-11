<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRecPublic\Controller;

use NasRec\Authentication\Adapter;
use NasRec\Entity;

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
                return $this->redirect()->toRoute('nas-rec-public');
            }
        }

        return array(
            'form' => $form,
        );
    }
} 
