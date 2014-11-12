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

class Application extends Form
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
} 
