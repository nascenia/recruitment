<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\LabelAwareInterface;
use Zend\Form\View\Helper\FormRow as ZendFormRow;

class FormRow extends ZendFormRow
{
    public function render(ElementInterface $element)
    {
        if ($element instanceof LabelAwareInterface) {
            $element->setLabelAttributes(array_merge(
                $element->getLabelAttributes()
                , array('class' => 'control-label')
            ));
        }

        $labelHtml = $element->getLabel() ? $this->view->formLabel($element) : '';

        $preAddon = $element->getOption('pre_addon');
        $preAddon = $preAddon ? '<span class="input-group-addon">'. $preAddon .'</span>' : '';

        $inputHtml = $this->view->formElement($element);

        $inputGroupStart = $preAddon ? '<div class="input-group">' : '';
        $inputGroupEnd = $preAddon ? '</div>' : '';

        $errorClass = $element->getMessages() ? 'has-error' : '';
        $errorHtml = $this->view->formElementErrors($element, array(
            'class' => 'help-block',
        ));

        return <<<HTML
<div class="form-group {$errorClass}">
    {$labelHtml}
    {$inputGroupStart}
        {$preAddon}
        {$inputHtml}
    {$inputGroupEnd}
    {$errorHtml}
</div>
HTML;

    }
} 
