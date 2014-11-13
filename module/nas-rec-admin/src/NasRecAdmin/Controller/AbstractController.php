<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace NasRecAdmin\Controller;

use Nascenia\Zend\Authentication\Identity\IdentityInterface;
use Nascenia\Zend\Controller\AbstractController as NasceniaAbstractController;
use NasRec\Controller\RolesAuthorizedInterface;

abstract class AbstractController extends NasceniaAbstractController implements RolesAuthorizedInterface
{
    public function getAllowedRoles()
    {
        return array(
            IdentityInterface::ROLE_NASCENIA_STAFF,
        );
    }
}
