<?php
return array(
    'router' => array(
        'routes' => array(
            'guestbook' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/guestbook',
                    'defaults' => array(
                        'controller'    => 'guestbook-index',
                        'action'        => 'index',
                    ),
                ),
            ),
            'entry' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/entry',
                    'defaults' => array(
                        'controller'    => 'guestbook-index',
                        'action'        => 'entry',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'guestbook-index' => 'Guestbook\Factory\IndexControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'guestbook' => __DIR__ . '/../view',
        ),
    ),
    'service_manager' => [
        'factories' => [
            'entry_form'    => 'Guestbook\Factory\EntryFormFactory',
            'entry_table'   => 'Guestbook\Factory\EntryTableFactory',
            'entry_service' => 'Guestbook\Factory\EntryServiceFactory',
        ]
    ]
);
