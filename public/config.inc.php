<?php

// This displays errors in the browser when there is any
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Import Dotenv to use here
use Dotenv\Dotenv;

// Include all libraries installed with composer
require __DIR__ . '/../vendor/autoload.php';

// Lood environment variables and make it access in $_ENV
Dotenv::createImmutable(__DIR__ . '/..')->safeLoad();

// Connect to the database using pdo driver
dibi::connect([
    'driver' => 'pdo',
    'dsn' => $_ENV['DSN'],
    'username' => $_ENV['USERNAME'],
    'password' => $_ENV['PASSWORD'],
]);

// Start session so we can use $_SESSION to retrieve them
session_start();