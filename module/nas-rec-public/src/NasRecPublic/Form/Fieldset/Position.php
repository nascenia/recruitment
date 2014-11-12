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

class Position extends Fieldset
{
    /**
     * @var EntityRepository
     */
    protected $positions;

    public function __construct(EntityRepository $positions)
    {
        $this->positions = $positions;

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
} 
