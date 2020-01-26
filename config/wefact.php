<?php

return [

    'default' => env('WEFACT_CONNECTION', 'default'),

    'panels' => [

        'default' => [
            'url' => env('WEFACT_DEFAULT_URL', 'https://api.mijnwefact.nl/v2/'),
            'key' => env('WEFACT_DEFAULT_KEY'),
        ],

    ],

];