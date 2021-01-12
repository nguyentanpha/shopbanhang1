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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '123753162751121',  //client face của bạn
        'client_secret' => '980af5d4d6b7bdd40c78255f6311b291',  //client app service face của bạn
        'redirect' => 'http://localhost:8080/shopbanhang1/admin/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '145040385038-4oa7gjb6oefup6dgc0iruf2itd14rlgq.apps.googleusercontent.com',
        'client_secret' => 'sbIXj9Jw5d-khrwNwzx3q_Ca',
        'redirect' => 'http://localhost:8080/shopbanhang1/google/callback'
    ],



];
