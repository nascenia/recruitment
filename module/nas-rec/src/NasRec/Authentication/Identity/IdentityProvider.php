<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec\Authentication\Identity;

use Nascenia\Zend\Authentication\Authentication;
use Nascenia\Zend\Controller\AbstractController;
use Zend\Session\Container;

class IdentityProvider
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @var AbstractController
     */
    protected $controller;

    public function __construct(Authentication $auth, AbstractController $controller)
    {
        $this->auth = $auth;
        $this->controller = $controller;
    }

    public function getAuthenticatedIdentity($forced = false)
    {
        $identity = $this->auth->getIdentity();

        if (!$identity && $forced) {
            $session = new Container('NasRecPublic_Auth');
            $session->url = $_SERVER['REQUEST_URI'];

            $this->controller->redirect()->toRoute('nas-rec-public/auth/login');
        }

        return $identity;
    }

    public function getIdentity($forced = false)
    {
        $identity = $this->getAuthenticatedIdentity($forced);
        return $identity;
    }

    public function clearIdentity()
    {
        $this->auth->clearIdentity();
    }
}
