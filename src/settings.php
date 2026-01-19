<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            /*'path' => '/var/www/html/api.synpat.com/logs/app.log',*/
            'level' => \Monolog\Logger::DEBUG,
        ],
		'db' => [
            'host' => 'localhost',
            'dbname' => 'synpat_backyard',
            'user' => 'synpat_backyard',
            'password' => 'J=W3qx4s',
            'charset' => 'utf8',
            'collate' => 'utf8_unicode_ci',
        ],
		'db1' => [
            'host' => 'localhost',
            'dbname' => 'claimcha_new',
            'user' => 'claimcha_claim',
            'password' => '4QPSf29!2o',
            'charset' => 'utf8',
            'collate' => 'utf8_unicode_ci',
        ],
		'docket-key'=>'FAmEG9jc18JnbN9VTaygetwL',
		'sy-password'=>'q20zkh9esXlg6gJt9ixgSnU1VlXOFNtSDqoL'
    ],
];
