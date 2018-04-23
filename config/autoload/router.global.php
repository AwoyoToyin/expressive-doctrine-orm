<?php

use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\RouterInterface;

return [
    'dependencies' => [
        'invokables' => [
            RouterInterface::class => FastRouteRouter::class,
        ],
    ],

    'router' => [
        'fastroute' => [
             // Enable caching support:
            'cache_enabled' => true,
             // Optional (but recommended) cache file path:
            'cache_file'    => 'data/cache/fastroute.php.cache',
        ],
    ],
];
