<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\Listener;

use RdnEvent\Listener\AbstractListener;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ViewWrapper extends AbstractListener
{
    public function attach(EventManagerInterface $events) {
        $events->attach(MvcEvent::EVENT_RENDER, array($this, 'onRender'), -1000);
    }

    public function onRender(MvcEvent $event) {
        $app = $event->getApplication();
        $services = $app->getServiceManager();

        $config = $services->get('Config');
        $config = $config['nas_view_wrapper'];

        $model = $event->getViewModel();
        if ($model->terminate() || $model instanceof JsonModel) {
            return;
        }

        $wrapper = new ViewModel;
        $wrapper->setTemplate($config['template']);
        $wrapper->addChild($model);

        $event->setViewModel($wrapper);
    }
} 
