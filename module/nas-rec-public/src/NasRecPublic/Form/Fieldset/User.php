<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

namespace NasRecPublic\Form\Fieldset;

use Doctrine\ORM\EntityRepository;
use NasRec\Entity;
use Nascenia\Zend\Hydrator;
use Nascenia\Zend\Form\Fieldset\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class User extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var EntityRepository
     */
    protected $users;

    public function __construct(EntityRepository $users)
    {
        $this->users = $users;

        parent::__construct();
    }

    public function init()
    {
        $this->setHydrator(new Hydrator\Entity($this->users, 'email'));
        $this->setObject(new Entity\User);

        $this->add(array(
            'type' => 'text',
            'name' => 'displayName',

            'options' => array(
                'label' => 'Name',
            ),

            'attributes' => array(
                'class' => 'form-control',
                'size' => 48,
            ),
        ));

        $this->add(array(
            'type' => 'email',
            'name' => 'email',

            'options' => array(
                'label' => 'Email',
            ),

            'attributes' => array(
                'class' => 'form-control',
                'size' => 32,
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
            'displayName' => array(
                'required' => true,
            ),

            'email' => array(
                'required' => true,
            ),
        );
    }
}
