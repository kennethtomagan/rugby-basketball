<?php

use Illuminate\Support\Facades\Facade;


return [

    /*
    |--------------------------------------------------------------------------
    | Rugby API
    |--------------------------------------------------------------------------
    |
    | Configuration for Rugby API
    |
    */
    'rugby' => [
        'url' => 'https://www.zeald.com/developer-tests-api/x_endpoint/allblacks'
    ],
    
    /*
    |--------------------------------------------------------------------------
    | NBA API
    |--------------------------------------------------------------------------
    |
    | Configuration for NBA API
    |
    */
    'nba' => [
        'player' => [
            'url' => 'https://www.zeald.com/developer-tests-api/x_endpoint/nba.players',
        ],
        'stats' => [
            'url' => 'https://www.zeald.com/developer-tests-api/x_endpoint/nba.stats',
        ]
    ],
];
