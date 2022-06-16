<?php

return [
    'app_name' => env('ADMIN_APP_NAME', 'BUBT Alumni'),
    'sso_enabled' => env('ADMIN_SSO_ENABLED', false),
    "toaster_alert" => [
        'key' => "bubt_alumni_alert",
        'levels' => [
            'success',
            'error',
            'info',
            'warning',
        ]
    ]
];
