<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRecPublic\Form;

use Nascenia\Zend\Form\Form;
use Nascenia\Zend\Hydrator;
use RdnUpload\ContainerInterface;
use RdnUpload\Hydrator\Strategy;
use Zend\InputFilter\InputFilterProviderInterface;

class Application extends Form implements InputFilterProviderInterface
{
    protected $uploads;

    public function __construct(ContainerInterface $uploads)
    {
        $this->uploads = $uploads;

        parent::__construct();
    }

    public function init()
    {
        $hydrator = new Hydrator\Entity;
        $hydrator->addStrategy('resume', new Strategy\Upload($this->uploads));

        $this->setHydrator($hydrator);

        $this->add(array(
            'type' => 'NasRecPublic:Fieldset:Position',
            'name' => 'position',
        ));

        $this->add(array(
            'type' => 'NasRecPublic:Fieldset:User',
            'name' => 'user',
        ));

        $this->add(array(
            'type' => 'file',
            'name' => 'resume',

            'options' => array(
                'label' => 'Resume',
            ),
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',

            'attributes' => array(
                'class' => 'btn btn-primary',
                'value' => 'Submit',
            ),
        ));
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            // todo - ensure no previous application for this position
            'resume' => array(
                'required' => true,
            ),
        );
    }
}
