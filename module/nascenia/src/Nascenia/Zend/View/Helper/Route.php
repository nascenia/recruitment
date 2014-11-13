<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-13
 * @version 2014-11-13
 */

namespace Nascenia\Zend\View\Helper;

use Zend\Mvc\MvcEvent;
use Zend\View\Helper\AbstractHelper;

class Route extends AbstractHelper
{
    /**
     * @var MvcEvent
     */
    protected $event;

    public function __construct(MvcEvent $event)
    {
        $this->event = $event;
    }

    public function current()
    {
        $match = $this->event->getRouteMatch();
        return $match ? $match->getMatchedRouteName() : null;
    }

    public function matches($route)
    {
        $currentRoute = $this->current();
        return $currentRoute && strpos($currentRoute, $route) === 0;
    }
}
