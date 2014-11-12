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
            $this->entity()->persist($app);
            $this->entity()->flush();

            $this->flashMessenger()->addSuccessMessage('Thank you for submitting your application!');

            return $this->redirect()->toRoute(null, array(), true);
        }

        return array(
            'form' => $form,
        );
    }
} 
