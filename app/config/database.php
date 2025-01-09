<?php

return [
    'dsn' => 'mysql:host=db;dbname=app_db;charset=utf8',
    'username' => 'user',
    'password' => 'password',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];