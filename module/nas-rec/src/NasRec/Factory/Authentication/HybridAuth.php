<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-14
 * @version 2014-11-14
 */

namespace NasRec\Factory\Authentication;

use RdnFactory\AbstractFactory;

class HybridAuth extends AbstractFactory
{
    protected function create()
    {
        $config = array(
            'base_url' => $this->url('nas-rec-public/auth/login', [], ['force_canonical' => true], true),
            'providers' => array(
                'Google' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => $this->config('hybrid_auth', 'google', 'id'),
                        'secret' => $this->config('hybrid_auth', 'google', 'secret'),
                    ),
                    'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
                ),
            ),
        );
        return new \Hybrid_Auth($config);
    }
}
