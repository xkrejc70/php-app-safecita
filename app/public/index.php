<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\ContactController;
use App\Repository\ContactRepository;
use App\Service\ContactService;
use App\Utils\Validator;

// Load config
// TODO from .env
$config = require __DIR__ . '/../config/database.php';
$pdo = new PDO($config['dsn'], $config['username'], $config['password'], $config['options']);

// Basic DI
$repository = new ContactRepository($pdo);
$validator = new Validator();
$service = new ContactService($repository, $validator);
$controller = new ContactController($service);

$controller->renderForm();

