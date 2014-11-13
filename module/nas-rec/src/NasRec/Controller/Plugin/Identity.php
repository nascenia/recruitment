<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

namespace NasRec\Controller\Plugin;

use NasRec\Authentication\Identity\IdentityProvider;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Identity extends AbstractPlugin
{
    /**
     * @var IdentityProvider
     */
    protected $identityProvider;

    public function __construct(IdentityProvider $identityProvider)
    {
        $this->identityProvider = $identityProvider;
    }

    public function __invoke($forced = false)
    {
        return $this->identityProvider->getIdentity($forced);
    }
}
