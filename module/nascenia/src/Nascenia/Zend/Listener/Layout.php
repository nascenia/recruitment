<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace Nascenia\Zend\Listener;

use Nascenia\Zend\Controller\AbstractController;
use RdnEvent\Listener\AbstractListener;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

class Layout extends AbstractListener
{
    public function attach(EventManagerInterface $events)
    {
        $sharedEvents = $events->getSharedManager();
        $sharedEvents->attach('Zend\Stdlib\DispatchableInterface', MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'));
    }

    public function onDispatch(MvcEvent $event) {
        $app = $event->getApplication();
        $services = $app->getServiceManager();

        $config = $services->get('Config');
        if (!isset($config['nas_view_layouts'])) {
            return;
        }
        $config = $config['nas_view_layouts'];

        $controller = $event->getTarget();
        if (!$controller instanceof AbstractController) {
            return;
        }
        $module = current(explode('\\', get_class($controller)));

        if (!isset($config[$module])) {
            return;
        }

        $controller->layout($config[$module]);
    }
}
