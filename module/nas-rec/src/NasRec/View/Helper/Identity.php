<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRec\View\Helper;


use NasRec\Authentication\Identity\IdentityProvider;
use Zend\View\Helper\AbstractHelper;

class Identity extends AbstractHelper
{
    /**
     * @var IdentityProvider
     */
    protected $identityProvider;

    public function __construct(IdentityProvider $identityProvider)
    {
        $this->identityProvider = $identityProvider;
    }

    public function __invoke()
    {
        return $this->identityProvider->getIdentity();
    }
} 
