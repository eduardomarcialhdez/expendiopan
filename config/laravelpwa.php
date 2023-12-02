<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'Expendio de Pan'),
        'short_name' => 'Expendio Pan',
        'description' => 'Contamos con los mejores panes de la región',
        'start_url' => '/',
        'id' => '/',
        'background_color' => '#b9cdc4',
        'theme_color' => '#ac8255', 
        'display' => 'fullscreen',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'scope' => './',
        'lang' => 'es-MX',
        'maintainer' => 'Eduardo Marcial Hernández',
        'contact' => 'edumarher15@gmail.com',
        'icons' => [
            '16x16' => [
                'path' => '/images/icons/icon-16.png',
                'purpose' => 'any maskable'
            ],
            '32x32' => [
                'path' => '/images/icons/icon-32.png',
                'purpose' => 'any maskable'
            ],
            '64x64' => [
                'path' => '/images/icons/icon-64.png',
                'purpose' => 'any maskable'
            ],
            '72x72' => [
                'path' => '/images/icons/icon-72.png',
                'purpose' => 'any maskable'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96.png',
                'purpose' => 'any maskable'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128.png',
                'purpose' => 'any maskable'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144.png',
                'purpose' => 'any maskable'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152.png',
                'purpose' => 'any maskable'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192.png',
                'purpose' => 'any maskable'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384.png',
                'purpose' => 'any maskable'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512.png',
                'purpose' => 'any maskable'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [],
        'custom' => []
    ]
];
