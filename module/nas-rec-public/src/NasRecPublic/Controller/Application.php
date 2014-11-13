<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRecPublic\Controller;

use NasRec\Entity;

class Application extends AbstractController
{
    public function createAction()
    {
        $app = new Entity\Application;
        $app->setCreatedAt(new \DateTime);

        $form = $this->form('NasRecPublic:Application');
        $form->bind($app);

        $postData = array_merge(
            $this->request->getPost()->toArray()
            , $this->request->getFiles()->toArray()
        );
        if ($this->request->isPost() && $form->isValid($postData)) {
            if (!$app->getUser()->getId()) {
                $this->initializeUser($app->getUser());
            }

            $this->entity()->persist($app);
            $this->entity()->flush();

            // todo send email

            $this->flashMessenger()->addSuccessMessage('Thank you for submitting your application!');

            // todo - should we redirect to someplace else?
            return $this->redirect()->toRoute(null, array(), true);
        }

        return array(
            'form' => $form,
        );
    }

    protected function initializeUser(Entity\User $user)
    {
        $password = bin2hex(openssl_random_pseudo_bytes(8));
        $password = 'password';
        $user->setPassword(password_hash($password, PASSWORD_DEFAULT));

        $email = $user->getEmail();
        if (preg_match('/@(nascenia|bdipo).com$/', $email)) {
            $user->setIsAdmin(true);
        }
    }
} 
