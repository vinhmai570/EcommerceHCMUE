<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
	'secret' => env('PAYPAL_CLIENT_SECRET'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE'),
        'http.ConnectionTimeOut' => 60,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
