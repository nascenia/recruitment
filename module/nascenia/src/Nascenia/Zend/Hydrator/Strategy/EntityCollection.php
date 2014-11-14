<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-14
 * @version 2014-11-14
 */

namespace Nascenia\Zend\Hydrator\Strategy;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Nascenia\Zend\Hydrator\Entity;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class EntityCollection implements StrategyInterface
{
    /**
     * @var EntityRepository
     */
    protected $entities;

    protected $field;

    protected $hydrator;

    public function __construct(EntityRepository $entities, $field = 'id')
    {
        $this->entities = $entities;
        $this->field = $field;

        $this->hydrator = new Entity($entities);
    }

    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param mixed $value The original value.
     * @param object $object (optional) The original object for context.
     * @return mixed Returns the value that should be extracted.
     */
    public function extract($value)
    {
        $data = array();

        foreach ($value as $entity) {
            $entityData = $this->hydrator->extract($entity);
            $data[] = $entityData[$this->field];
        }

        return $data;
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @param array $data (optional) The original data for context.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $object = new ArrayCollection;
        $entityClass = $this->entities->getClassName();

        foreach ($value as $entityData) {
            $entity = $this->hydrator->hydrate(array(
                $this->field => $entityData,
            ), new $entityClass);
            $object->add($entity);
        }

        return $object;
    }
}
