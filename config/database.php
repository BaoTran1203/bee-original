<?php

return [

    'default' => 'mysql',

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => 'database.sqlite',
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => 'bee_original',
            'username' => 'root',
            'password' => 'baotran1203',
            'unix_socket' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => 'bee_',
            'strict' => true,
            'engine' => null,
            'timezone' => '+07:00'
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => '127.0.0.1',
            'port' => '5432',
            'database' => '',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => 'localhost',
            'port' => '1433',
            'database' => '',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    'migrations' => 'migrations',

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],
    ],

];
