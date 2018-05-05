<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '1641727352578391',
        'client_secret' =>'0821ea5e60309e73db001b43c95b6528',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '20902713026-o1ln2r9crpsk1eo0bf7ds2bf7gohcelu.apps.googleusercontent.com',
        'client_secret' =>'8xLOoeME-XI2jhYvNExlgwrl',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
