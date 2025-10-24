<?php

return [
    'pathsa' => [
        'api/*',
        'sanctum/csrf-cookies',
        'login',
        'logout',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http//localhost:3000'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'suppoerts_credentials' => true,
];
