<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-13
 * @version 2014-11-13
 */

namespace NasRec\Listener;

use NasRec\Controller\RolesAuthorizedInterface;
use NasRecAdmin\Controller\AbstractController;
use RdnEvent\Listener\AbstractListener;
use RdnException\AccessDeniedException;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

class Authorization extends AbstractListener
{
    public function attach(EventManagerInterface $events)
    {
        $sharedEvents = $events->getSharedManager();
        $sharedEvents->attach('Zend\Stdlib\DispatchableInterface', MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 1000);
    }

    public function onDispatch(MvcEvent $event) {
        $controller = $event->getTarget();
        if (!$controller instanceof AbstractController || !$controller instanceof RolesAuthorizedInterface) {
            return;
        }

        $roles = $controller->getAllowedRoles();
        $identity = $controller->identity(true);

        if (!$identity) {
            return;
        }

        foreach ($roles as $role) {
            if ($identity->hasRole($role)) {
                return;
            }
        }

        throw new AccessDeniedException('You are not allowed to access this page ('. $identity->getEmail() .')');
    }
}
