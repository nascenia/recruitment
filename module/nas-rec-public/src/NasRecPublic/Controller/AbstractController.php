<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRecPublic\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Nascenia\Zend\Authentication\Identity\IdentityInterface;
use NasRec\Entity;
use Nascenia\Zend\Controller\AbstractController as NasceniaAbstractController;

/**
 * @method EntityManager|EntityRepository entity($entityName = null)
 * @method IdentityInterface identity()
 */
abstract class AbstractController extends NasceniaAbstractController
{
}
