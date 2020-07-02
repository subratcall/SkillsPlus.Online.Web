<?php
return [
    'client_id'                 => env('PAYPAL_CLIENT_ID','AZJNGj0dThnyjWtgD9quqpt4jG6jKAnkc_YzDHDDpXcY7oG-v3Bkq_d21BO7t0oyNCqz9dli8wiGbCAS'),
    'secret'                    => env('PAYPAL_SECRET','EMzvsiwYXm881OIDWxehuCGZ94n8MFstRaT6cZdGK0XgAk_McFiCyifi42HKcXMT5AU78dDNLn6I_eur'),
    'settings'                  => array(
        'mode'                  => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut'=> 30,
        'log.LogEnabled'        => true,
        'log.FileName'          => storage_path() . '/logs/paypal.log',
        'log.LogLevel'          => 'ERROR'
    ),
];
