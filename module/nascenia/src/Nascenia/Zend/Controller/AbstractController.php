<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Nascenia\Zend\Authentication\Authentication;
use Nascenia\Zend\Authentication\Identity\IdentityInterface;
use RdnException\NotFoundException;
use Zend\Form\Form;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * @method Authentication auth()
 * @method EntityManager|EntityRepository entity($entityName = null)
 * @method Form form(string $name = null)
 * @method IdentityInterface identity()
 */
class AbstractController extends AbstractActionController
{
    /**
     * @var Request
     */
    protected $request;

    protected function createHttpNotFoundModel(Response $response)
    {
        throw new NotFoundException('Could not find action');
    }
}
