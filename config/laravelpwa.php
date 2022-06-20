<?php

$url = 'https://random-data-api.com/api/address/random_address';
$url = env('ADMIN_URL').'api/manifest';
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);
$response = file_get_contents($url,false, stream_context_create($arrContextOptions));
$pwaInfo= json_decode($response, true);


return [
    'name' => 'PWA',
    'manifest' => [
        'name' => $pwaInfo['name'],
        'short_name' => $pwaInfo['name'],
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => $pwaInfo['icon'],
                'purpose' => 'any'
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
        'custom' => []
    ]
];
