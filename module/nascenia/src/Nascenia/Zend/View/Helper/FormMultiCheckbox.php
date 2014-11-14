<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-14
 * @version 2014-11-14
 */

namespace Nascenia\Zend\View\Helper;

use Zend\Form\Element\MultiCheckbox;
use Zend\Form\View\Helper\FormMultiCheckbox as ZendFormMultiCheckbox;

class FormMultiCheckbox extends ZendFormMultiCheckbox
{
    protected $separator = '~~~';

    protected function renderOptions(MultiCheckbox $element, array $options, array $selectedOptions, array $attributes)
    {
        $rendered = parent::renderOptions($element, $options, $selectedOptions, $attributes);
        $options = explode($this->getSeparator(), $rendered);

        return '<div class="checkbox">'. implode('</div><div class="checkbox">', $options) .'</div>';
    }
} 
