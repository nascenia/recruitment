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

class Position extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var EntityRepository
     */
    protected $positions;

    public function __construct(EntityRepository $users)
    {
        $this->positions = $users;

        parent::__construct();
    }

    public function init()
    {
        $this->setHydrator(new Hydrator\Entity($this->positions));
        $this->setObject(new Entity\Position);

        $this->add(array(
            'type' => 'select',
            'name' => 'id',

            'options' => array(
                'label' => 'Position',
                'empty_option' => '-- Select --',
                'value_options' => $this->getPositionOptions(),
            ),
        ));
    }

    protected function getPositionOptions()
    {
        $opts = array();
        foreach ($this->positions->findAll() as $position) {
            $opts[$position->getId()] = $position->getName();
        }
        return $opts;
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
            'id' => array(
                'required' => true,
            ),
        );
    }
}
