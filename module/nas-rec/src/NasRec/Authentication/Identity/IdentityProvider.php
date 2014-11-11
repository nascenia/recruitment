<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec\Authentication\Identity;

use Nascenia\Zend\Authentication\Authentication;

class IdentityProvider
{
    /**
     * @var Authentication
     */
    protected $auth;

    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function getAuthenticatedIdentity()
    {
        $identity = $this->auth->getIdentity();
        return $identity;
    }

    public function getIdentity()
    {
        $identity = $this->getAuthenticatedIdentity();
        return $identity;
    }

    public function clearIdentity()
    {
        $this->auth->clearIdentity();
    }
}
