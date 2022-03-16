<?php

return [
    'dataoke' => [
        'app_key' => env('DTK_APP_KEY', ''),
        'app_secret' => env('DTK_APP_SECRET', ''),
    ],
    'taobao' => [
        'app_key' => env('TAOBAO_APP_KEY', ''),
        'app_secret' => env('TAOBAO_APP_SECRET', ''),
        'format' => 'json',
    ],
    'jingdong' => [
        'app_key' => env('JD_APP_KEY', ''),
        'app_secret' => env('JD_APP_SECRET', ''),
    ]
];
