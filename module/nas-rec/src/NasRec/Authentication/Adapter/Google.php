<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-14
 * @version 2014-11-14
 */

namespace NasRec\Authentication\Adapter;

use Doctrine\ORM\EntityManager;
use NasRec\Entity;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Result;

class Google extends AbstractAdapter
{
    /**
     * @var EntityManager
     */
    protected $entities;

    /**
     * @var \Hybrid_Auth
     */
    protected $hybridAuth;

    public function __construct(EntityManager $entities, \Hybrid_Auth $hybridAuth)
    {
        $this->entities = $entities;
        $this->hybridAuth = $hybridAuth;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        try {
            $adapter = $this->hybridAuth->authenticate('Google');
            /** @var \Hybrid_User_Profile $profile */
            $profile = $adapter->getUserProfile();
        } catch (\Exception $ex) {
            return new Result(Result::FAILURE, null, array($ex->getMessage()));
        }

        $user = $this->entity('NasRec:User')->findOneBy(array(
            'email' => $profile->email,
        ));
        if (!$user instanceof Entity\User) {
            $user = new Entity\User;
            $user->setDisplayName($profile->displayName);
            $user->setEmail($profile->email);

            if (preg_match('/@(nascenia|bdipo).com$/', $user->getEmail())) {
                $user->setIsAdmin(true);
                $user->setPassword('');
            } else {
                return new Result(Result::FAILURE, null, array('You do not have access to this application'));
            }

            $this->entity()->persist($user);
            $this->entity()->flush();
        }

        return new Result(Result::SUCCESS, $user);
    }

    protected function entity($name = null)
    {
        if (func_num_args() == 0) {
            return $this->entities;
        }

        return $this->entities->getRepository($name);
    }
}
