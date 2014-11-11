<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace Nascenia\Zend\Authentication\Identity;

interface IdentityInterface
{
    const ROLE_ANONYMOUS = 'anonymous';
    const ROLE_GUEST = 'guest';
    const ROLE_NASCENIA_STAFF = 'nascenia-staff';

    /**
     * Get the email address for this identity.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Check whether the identity has the given role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role);

    /**
     * Return an array of all the roles this identity can access.
     *
     * @return array|string[]
     */
    public function getRoles();
} 
