<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '683428435850-8kt1a94k0in7sk5b4apjmtmjmv2hbdn3.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8080/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '5965846326856805',
        'client_secret' => '31a91ac10d3b5236a713f7c0a4dcf195',
        'redirect' => 'http://localhost:8080/login/facebook/callback',
    ],

];
