<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-12
 * @version 2014-11-12
 */

use Symfony\Component\Yaml\Yaml;

return array(
    'controllers' => array(
        'invokables' => array(
            'NasRecAdmin:Index' => 'NasRecAdmin\Controller\Index',
        ),
    ),

    'rdn_entity_managers' => array(
        'modules' => array(
            'NasRecAdmin' => 'NasRec',
        ),
    ),

    'router' => Yaml::parse(__DIR__ .'/router.yml'),

    'view_manager' => array(
        'controller_map' => array(
            'NasRecAdmin\Controller' => 'nas-rec-admin/mvc',
        ),

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
