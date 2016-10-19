<?php
return [
    'Starwars\\V1\\Rest\\Films\\Controller' => [
        'description' => 'Retrieve films in the star wars universe',
        'collection' => [
            'description' => 'Get a collection of films',
            'GET' => [
                'description' => 'Get the collection',
            ],
            'POST' => [
                'description' => 'Create a new film',
            ],
        ],
    ],
];
