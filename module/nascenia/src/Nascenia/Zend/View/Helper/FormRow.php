<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormRow as ZendFormRow;

class FormRow extends ZendFormRow
{
    public function render(ElementInterface $element)
    {
        $labelHtml = $element->getLabel() ? $this->view->formLabel($element) : '';
        $inputHtml = $this->view->formElement($element);

        return <<<HTML
<div class="form-group">
    {$labelHtml}
    {$inputHtml}
</div>
HTML;

    }
} 
