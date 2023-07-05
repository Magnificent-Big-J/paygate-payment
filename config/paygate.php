<?php
return [
    'paygate_id' => env('PAYGATE_ID', 'your-paygate-id'),
    'paygate_secret' => env('PAYGATE_SECRET', 'your-paygate-secret'),
    'notification_url' => env('PAYGATE_NOTIFICATION_URL', 'https://my.application.com/notify'),
    'return_url' => env('PAYGATE_RETURN_URL', 'https://my.application.com/return'),
];