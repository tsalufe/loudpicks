<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Monitor\Controller\Monitor' => 'Monitor\Controller\MonitorController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'monitor' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/monitor[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Monitor\Controller\Monitor',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'monitor' => __DIR__ . '/../view',
        ),
    ),
);
