<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */ 

return array(
    'controller_plugins' => array(
        'factories' => array(
            'identity' => 'NasRec\Factory\Controller\Plugin\Identity',
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'NasRec\Authentication\Identity\IdentityProvider' => 'NasRec\Factory\Authentication\Identity\IdentityProvider',
        ),
    ),

    'view_helpers' => array(
        'factories' => array(
            'identity' => 'NasRec\Factory\View\Helper\Identity',
        ),
    ),

    'rdn_entity_managers' => array(
        'managers' => array(
            'NasRec' => array(
                'table_prefixes' => array(
                    'NasRec' => 'nas_rec__',
                ),
            ),
        ),
    ),
);
