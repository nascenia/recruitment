<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

use Symfony\Component\Yaml\Yaml;

return array(
    'controllers' => array(
        'invokables' => array(
            'NasRecPublic:Application' => 'NasRecPublic\Controller\Application',
        ),
    ),

    'form_elements' => array(
        'factories' => array(
            'NasRecPublic:Application' => 'NasRecPublic\Factory\Form\Application',

            'NasRecPublic:Fieldset:Position' => 'NasRecPublic\Factory\Form\Fieldset\Position',
            'NasRecPublic:Fieldset:User' => 'NasRecPublic\Factory\Form\Fieldset\User',
        ),
        'invokables' => array(
            'NasRecPublic:Login' => 'NasRecPublic\Form\Login',
        ),
    ),

    'rdn_entity_managers' => array(
        'modules' => array(
            'NasRecPublic' => 'NasRec',
        ),
    ),

    'router' => Yaml::parse(__DIR__ .'/router.yml'),

    'view_manager' => array(
        'controller_map' => array(
            'NasRecPublic\Controller' => 'nas-rec-public/mvc',
        ),

        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
