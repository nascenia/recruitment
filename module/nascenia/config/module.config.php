<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

use Nascenia\Zend\Mvc\Application;

$cacheEnabled = APP_ENV != Application::ENV_DEV && PHP_SAPI != 'cli';

return array(
    'controller_plugins' => array(
        'factories' => array(
            'auth' => 'Nascenia\Zend\Factory\Controller\Plugin\Auth',
            'form' => 'Nascenia\Zend\Factory\Controller\Plugin\Form',
        ),
    ),

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
            'Nascenia:Layout' => 'Nascenia\Zend\Listener\Layout',
            'Nascenia:ViewWrapper' => 'Nascenia\Zend\Listener\ViewWrapper',
        ),
    ),

    'rdn_event' => array(
        'listeners' => array(
            'Nascenia:Layout',
            'Nascenia:ViewWrapper',
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'Nascenia\Authentication\Authentication' => 'Nascenia\Zend\Factory\Authentication\Authentication',
        ),
    ),

    'view_helpers' => array(
        'factories' => array(
            'route' => 'Nascenia\Zend\Factory\View\Helper\Route',
        ),
        'invokables' => array(
            'formRow' => 'Nascenia\Zend\View\Helper\FormRow',
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
