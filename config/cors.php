<?php

return [

    'paths' => [
        'api/*',
        'generate/checkout-url/*',
        'get-user-details',
        'kundali/save-user-details',
        'get-user-matching-details',
        'check-credits',
      	'check-panchang-credits',
        'check-remaining-credits',
        'kundali-matching/save-user-details',
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'https://*.myshopify.com',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
