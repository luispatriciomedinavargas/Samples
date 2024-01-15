<?php

return [
    'client_id'=>env('PAYPAL_SANDBOX_CLIENT_ID',''),
    'secret'=>env('PAYPAL_SANDBOX_CLIENT_SECRET',''),
    'url'=>env('PAYPAL_URL'),
    'settings'=>[
        'mode'=>env('paypal_mode','sandbox'),
        'http.ConnectionTimeOut'=> 30,
        'log.LogEnabled' => true,
        'log.FileName'=> storage_path('storage/logs/paypal.log'),
        'log.LogLevel'=> 'ERROR'
    ]
];

