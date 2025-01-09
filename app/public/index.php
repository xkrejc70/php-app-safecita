<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\ContactController;
use App\Repository\ContactRepository;
use App\Service\ContactService;
use App\Utils\Validator;
use Dotenv\Dotenv;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$config = [
    'dsn' => $_ENV['DB_DSN'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD']
];

// PDO
$pdo = new PDO($config['dsn'], $config['username'], $config['password']);

// Basic DI
$repository = new ContactRepository($pdo);
$validator = new Validator();
$service = new ContactService($repository, $validator);
$controller = new ContactController($service);

$controller->renderForm();

