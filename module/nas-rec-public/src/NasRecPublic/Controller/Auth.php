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
        if ($this->params()->fromQuery('hauth_start') || $this->params()->fromQuery('hauth_done')) {
            include 'vendor/hybridauth/hybridauth/hybridauth/index.php';
        } elseif ($this->identity()) {
            $this->redirectFromSession();
        } else {
            $adapter = new Adapter\Google(
                $this->entity()
                , $this->hybridAuth()
            );
            $result = $this->auth()->authenticate($adapter);

            if (!$result->isValid()) {
                return array(
                    'messages' => $result->getMessages(),
                );
            } else {
                return $this->redirectFromSession();
            }
        }
    }

    public function logoutAction()
    {
        $this->auth()->clearIdentity();
        return $this->redirect()->toRoute('nas-rec-public');
    }

    protected function hybridAuth()
    {
        return $this->serviceLocator->get('NasRec\Authentication\HybridAuth');
    }

    protected function redirectFromSession()
    {
        $session = new Container('NasRecPublic_Auth');
        return $session->url ? $this->redirect()->toUrl($session->url) : $this->redirect()->toRoute('nas-rec-public');
    }
} 
