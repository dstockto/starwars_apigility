<?php
return [
    'router' => [
        'routes' => [
            'starwars.rest.films' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/films[/:films_id]',
                    'defaults' => [
                        'controller' => 'Starwars\\V1\\Rest\\Films\\Controller',
                    ],
                ],
            ],
            'starwars.rest.people' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/people[/:people_id]',
                    'defaults' => [
                        'controller' => 'Starwars\\V1\\Rest\\People\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'starwars.rest.films',
            1 => 'starwars.rest.people',
        ],
    ],
    'zf-rest' => [
        'Starwars\\V1\\Rest\\Films\\Controller' => [
            'listener' => 'Starwars\\V1\\Rest\\Films\\FilmsResource',
            'route_name' => 'starwars.rest.films',
            'route_identifier_name' => 'films_id',
            'collection_name' => 'films',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Starwars\V1\Rest\Films\FilmsEntity::class,
            'collection_class' => \Starwars\V1\Rest\Films\FilmsCollection::class,
            'service_name' => 'films',
        ],
        'Starwars\\V1\\Rest\\People\\Controller' => [
            'listener' => \Starwars\V1\Rest\People\PeopleResource::class,
            'route_name' => 'starwars.rest.people',
            'route_identifier_name' => 'people_id',
            'collection_name' => 'people',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => 'size',
            'entity_class' => \Starwars\V1\Rest\People\PeopleEntity::class,
            'collection_class' => \Starwars\V1\Rest\People\PeopleCollection::class,
            'service_name' => 'people',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Starwars\\V1\\Rest\\Films\\Controller' => 'HalJson',
            'Starwars\\V1\\Rest\\People\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Starwars\\V1\\Rest\\Films\\Controller' => [
                0 => 'application/vnd.starwars.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Starwars\\V1\\Rest\\People\\Controller' => [
                0 => 'application/vnd.starwars.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Starwars\\V1\\Rest\\Films\\Controller' => [
                0 => 'application/vnd.starwars.v1+json',
                1 => 'application/json',
            ],
            'Starwars\\V1\\Rest\\People\\Controller' => [
                0 => 'application/vnd.starwars.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Starwars\V1\Rest\Films\FilmsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'starwars.rest.films',
                'route_identifier_name' => 'films_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Starwars\V1\Rest\Films\FilmsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'starwars.rest.films',
                'route_identifier_name' => 'films_id',
                'is_collection' => true,
            ],
            \Starwars\V1\Rest\People\PeopleEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'starwars.rest.people',
                'route_identifier_name' => 'people_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Starwars\V1\Rest\People\PeopleCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'starwars.rest.people',
                'route_identifier_name' => 'people_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'Starwars\\V1\\Rest\\Films\\FilmsResource' => [
                'adapter_name' => 'starwars',
                'table_name' => 'films',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Starwars\\V1\\Rest\\Films\\Controller',
                'entity_identifier_name' => 'id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'Starwars\\V1\\Rest\\Films\\Controller' => [
            'input_filter' => 'Starwars\\V1\\Rest\\Films\\Validator',
        ],
        'Starwars\\V1\\Rest\\People\\Controller' => [
            'input_filter' => 'Starwars\\V1\\Rest\\People\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Starwars\\V1\\Rest\\Films\\Validator' => [
            0 => [
                'name' => 'title',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => null,
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'episode_id',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            2 => [
                'name' => 'opening_crawl',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => null,
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'director',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => null,
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'release_date',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => null,
                        ],
                    ],
                ],
            ],
        ],
        'Starwars\\V1\\Rest\\People\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '40',
                            'min' => '5',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringToLower::class,
                        'options' => [],
                    ],
                ],
                'name' => 'name',
                'description' => 'Name of character',
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \Starwars\V1\Rest\People\PeopleResource::class => \Starwars\V1\Rest\People\PeopleResourceFactory::class,
            \Starwars\V1\Rest\People\StarwarsService::class => \Starwars\V1\Rest\People\StarwarsServiceFactory::class,
            'starwars-sql' => \Starwars\V1\Rest\People\StarWarsSqlFactory::class,
        ],
    ],
    'validators' => [
        'invokables' => [
            'foo' => 'Foo',
        ],
    ],
];
