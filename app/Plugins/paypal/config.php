<?php

return [

    'paypal' => [
        'mode'      => env('PAYPAL_MODE', 'sandbox'),
        'username'  => env('PAYPAL_USERNAME', 'sb-io12q2285968_api1.business.example.com'),
        'password'  => env('PAYPAL_PASSWORD', 'UQVXLENSGXM7UEGM'),
        'signature' => env('PAYPAL_SIGNATURE', 'AiYYUhFdSgkftg6I8wVgqbgVHhEyAF5YodvrouTyFBdH1KopcNQcrUN-'),
    ],

];
