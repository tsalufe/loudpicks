<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Hotpicks\Controller\Hotpicks' => 'Hotpicks\Controller\HotpicksController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'hotpicks' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/hotpicks[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[a-zA-Z.]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Hotpicks\Controller\Hotpicks',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'hotpicks' => __DIR__ . '/../view',
        ),
    ),

);
