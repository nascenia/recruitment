<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRec\Authentication\Adapter;

use Doctrine\ORM\EntityManager;
use NasRec\Entity;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Result;

class Simple extends AbstractAdapter
{
    protected $entities;

    protected $username;

    protected $password;

    public function __construct(EntityManager $entities, $username, $password)
    {
        $this->entities = $entities;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $user = $this->entity('NasRec:User')->findOneBy(array(
            'email' => $this->username,
        ));

        if (!$user instanceof Entity\User) {
            return new Result(Result::FAILURE_IDENTITY_NOT_FOUND, null, array('Incorrect username'));
        } elseif (!password_verify($this->password, $user->getPassword())) {
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array('Incorrect password'));
        }

        return new Result(Result::SUCCESS, $user);
    }

    protected function entity($name)
    {
        return $this->entities->getRepository($name);
    }
}
