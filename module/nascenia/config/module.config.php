<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

use Nascenia\Zend\Mvc\Application;

$cacheEnabled = APP_ENV != Application::ENV_DEV && PHP_SAPI != 'cli';

return array(
    'nas_view_wrapper' => array(
        'template' => 'nascenia/wrapper',
    ),

    'rdn_console' => array(
        'commands' => array(
            'RdnConsole:CacheClear',
        ),
    ),

    'rdn_entity_managers' => array(
        'configs' => array(
            'EntityManagerLoader' => array(
                'cache_provider' => $cacheEnabled ? 'FilesystemCache' : 'ArrayCache',
                'proxy_autogenerate' => !$cacheEnabled,
                'naming_strategy' => 'Nascenia\Doctrine\ORM\Mapping\UnderscoreNamingStrategy',
            ),
        ),
    ),

    'rdn_event_listeners' => array(
        'invokables' => array(
            'Nascenia:ViewWrapper' => 'Nascenia\Zend\Listener\ViewWrapper',
        ),
    ),

    'rdn_event' => array(
        'listeners' => array(
            'Nascenia:ViewWrapper',
        ),
    ),

    'view_manager' => array(
        'controller_map' => array(
            'Nascenia\Controller' => 'nascenia/mvc',
        ),

        'display_exceptions' => APP_ENV == Application::ENV_DEV,

        'layout' => 'nascenia/layout',

        'strategies' => array(
            'ViewJsonStrategy',
        ),

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
