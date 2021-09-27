<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Save IP address
    |--------------------------------------------------------------------------
    |
    */
    'save_ip' => true,

    /*
    |--------------------------------------------------------------------------
    | Login using credentials
    |--------------------------------------------------------------------------
    |
    | Specify which field is being used for logging in for each guard.
    | If no value is specified, it will default to email.
    |
    */
    'credentials' => [
        'web' => 'email',
        // 'customer' => 'username'
    ]
];