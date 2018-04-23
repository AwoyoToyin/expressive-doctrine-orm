<?php

namespace App;

return [
    'doctrine' => [
        'driver' => [
            'orm_default' => [
                'class' => \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain::class,
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_entity',
                ],
            ],
            __NAMESPACE__ . '_entity' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => __DIR__ . '/../src/Entity',
            ],
        ],
    ],
];
