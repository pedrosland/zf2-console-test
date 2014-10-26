<?php
return array(
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