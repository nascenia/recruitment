<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Authentication;

use Nascenia\Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\AuthenticationService as ZendAuthentication;

class Authentication extends ZendAuthentication
{
    public function clearIdentity()
    {
        parent::clearIdentity();

        $adapter = $this->getAdapter();
        if ($adapter instanceof AdapterInterface)
        {
            $adapter->clearIdentity();
        }
    }
} 
