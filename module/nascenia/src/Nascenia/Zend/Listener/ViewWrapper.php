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
use Zend\View\ViewEvent;

class ViewWrapper extends AbstractListener
{
    protected $skip;

    public function attach(EventManagerInterface $events) {
        $events->attach(MvcEvent::EVENT_RENDER, array($this, 'onRender'), -1000);
    }

    public function onRender(MvcEvent $event) {
        $app = $event->getApplication();
        $sharedEvents = $app->getEventManager()->getSharedManager();
        $services = $app->getServiceManager();

        $config = $services->get('Config');
        $config = $config['nas_view_wrapper'];

        $this->skip = false;
        $sharedEvents->attach('Zend\View\View', ViewEvent::EVENT_RENDERER_POST, function(ViewEvent $event) use ($config) {
            if ($this->skip) {
                return;
            }

            $model = $event->getModel();
            if ($model instanceof JsonModel) {
                $this->skip = true;
                return;
            }

            $wrapper = new ViewModel;
            $wrapper->setTemplate($config['template']);
            $wrapper->addChild($model);

            $event->setModel($wrapper);

            $this->skip = true;
        });
    }
} 
