<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'guestbook-index' => 'Guestbook\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'guestbook' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/guestbook',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        //'__NAMESPACE__' => 'Guestbook\Controller',
                        'controller'    => 'guestbook-index',
                        'action'        => 'index',
                    ),
                ),
                
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Guestbook' => __DIR__ . '/../view',
        ),
    ),
);
