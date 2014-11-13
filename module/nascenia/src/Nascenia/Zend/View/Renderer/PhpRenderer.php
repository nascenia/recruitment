<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\View\Renderer;

use Nascenia\Zend\View\Helper\Route;
use RdnUpload\View\Helper\Uploads;
use Zend\Form\View\Helper\Form;
use Zend\View\Helper\HeadTitle;
use Zend\View\Renderer\PhpRenderer as ZendPhpRenderer;

/**
 * @method string|Form form(\Zend\Form\Form $form) render form object
 * @method string|HeadTitle headTitle() render <title> tag
 * @method Route route()
 * @method Uploads uploads()
 */
class PhpRenderer extends ZendPhpRenderer
{
} 
