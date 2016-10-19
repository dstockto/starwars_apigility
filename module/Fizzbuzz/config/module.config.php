<?php
return [
    'service_manager' => [
        'factories' => [
            \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiResource::class => \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'fizzbuzz.rest.fizz-buzz-api' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/fizz-buzz[/:fizz_buzz_api_id]',
                    'defaults' => [
                        'controller' => 'Fizzbuzz\\V1\\Rest\\FizzBuzzApi\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'fizzbuzz.rest.fizz-buzz-api',
        ],
    ],
    'zf-rest' => [
        'Fizzbuzz\\V1\\Rest\\FizzBuzzApi\\Controller' => [
            'listener' => \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiResource::class,
            'route_name' => 'fizzbuzz.rest.fizz-buzz-api',
            'route_identifier_name' => 'fizz_buzz_api_id',
            'collection_name' => 'fizz_buzz_api',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiEntity::class,
            'collection_class' => \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiCollection::class,
            'service_name' => 'FizzBuzzApi',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Fizzbuzz\\V1\\Rest\\FizzBuzzApi\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Fizzbuzz\\V1\\Rest\\FizzBuzzApi\\Controller' => [
                0 => 'application/vnd.fizzbuzz.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Fizzbuzz\\V1\\Rest\\FizzBuzzApi\\Controller' => [
                0 => 'application/vnd.fizzbuzz.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiEntity::class => [
                'entity_identifier_name' => 'number',
                'route_name' => 'fizzbuzz.rest.fizz-buzz-api',
                'route_identifier_name' => 'fizz_buzz_api_id',
                'hydrator' => \Zend\Hydrator\ClassMethods::class,
            ],
            \Fizzbuzz\V1\Rest\FizzBuzzApi\FizzBuzzApiCollection::class => [
                'entity_identifier_name' => 'number',
                'route_name' => 'fizzbuzz.rest.fizz-buzz-api',
                'route_identifier_name' => 'fizz_buzz_api_id',
                'is_collection' => true,
            ],
        ],
    ],
];
