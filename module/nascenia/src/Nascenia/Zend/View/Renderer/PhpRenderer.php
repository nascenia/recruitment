<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\View\Renderer;

use Zend\Form\View\Helper\Form;
use Zend\View\Helper\HeadTitle;
use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * @method string|Form form(\Zend\Form\Form $form) render form object
 * @method string|HeadTitle headTitle() render <title> tag
 */
class PhpRenderer extends ZendPhpRenderer
{
} 
