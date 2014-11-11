<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Form extends AbstractPlugin
{
    protected $forms;

    public function __construct($forms)
    {
        $this->forms = $forms;
    }

    public function __invoke($name)
    {
        return $this->forms->get($name);
    }
} 
