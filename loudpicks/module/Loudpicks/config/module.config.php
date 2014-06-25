<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Loudpicks\Controller\Loudpicks' => 'Loudpicks\Controller\LoudpicksController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'loudpicks' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/loudpicks[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Loudpicks\Controller\Loudpicks',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'loudpicks' => __DIR__ . '/../view',
        ),
    ),
);
