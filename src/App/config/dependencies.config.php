<?php

namespace App;

use Zend\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Expressive\Template\TemplateRendererInterface;
use Doctrine\Common\Cache\Cache;

return [
    'dependencies' => [
        'invokables' => [
            Action\PingAction::class => Action\PingAction::class,
        ],
        'factories'  => [
            // Services
            Service\PostService::class => ConfigAbstractFactory::class,

            // Providers
            Provider\PostProvider::class => ConfigAbstractFactory::class,

            // Middleware
            Action\HomePageAction::class => ConfigAbstractFactory::class,
        ],
    ],

    ConfigAbstractFactory::class => [
        // Services
        Service\PostService::class => [Provider\PostProvider::class],

        // Providers
        Provider\PostProvider::class => ['doctrine.entity_manager.orm_default'],

        // Middleware
        Action\HomePageAction::class => [Service\PostService::class, TemplateRendererInterface::class],
    ]
];
