<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'pengguna',
        'passwords' => 'penggunas',
    ],

    'guards' => [
        'pengguna' => [
            'driver' => 'session',
            'provider' => 'penggunas',
        ],
        'pemilik' => [
            'driver' => 'session',
            'provider' => 'pemiliks',
        ],

        'penyewa' => [
            'driver' => 'session',
            'provider' => 'penyewas',
        ],
    ],

    'providers' => [
        'penggunas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pengguna::class,
        ],
        'pemiliks' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pemilik::class,
        ],
         'penyewas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Penyewa::class, // pastikan nama model benar
        ],
    ],

    'passwords' => [
        'penggunas' => [
            'provider' => 'penggunas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'pemiliks' => [
            'provider' => 'pemiliks',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,



];
