<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace Nascenia\Zend\Hydrator;

use Doctrine\ORM\EntityRepository;
use Zend\Stdlib\Hydrator\ClassMethods;

class Entity extends ClassMethods
{
    protected $repository;

    protected $field;

    public function __construct(EntityRepository $repository = null, $field = 'id')
    {
        $this->repository = $repository;
        $this->field = $field;

        parent::__construct(false);
    }

    public function hydrate(array $data, $object)
    {
        if ($this->repository) {
            $entity = $this->repository->findOneBy(array(
                $this->field => $data[$this->field],
            ));

            if (is_object($entity) && ($entity instanceof $object || $object instanceof $entity)) {
                $object = $entity;
            }
        }

        return parent::hydrate($data, $object);
    }
} 
