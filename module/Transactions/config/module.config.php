<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Transactions\Controller\Transactions' => 'Transactions\Controller\TransactionsController',
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'transactions' => array(
                    'options' => array(
                        'route'    => 'transactions list <merchantID>',
                        'defaults' => array(
                            'controller' => 'Transactions\Controller\Transactions',
                            'action'     => 'list'
                        )
                    )
                )
            )
        )
    ),
);