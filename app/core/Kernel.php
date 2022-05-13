<?php

use Pecee\SimpleRouter\SimpleRouter;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$connection = null;
try {
    $connection = new PDO("mysql:host=" . $_ENV["MYSQL_HOST"] . ";dbname=" . $_ENV["MYSQL_DATABASE_NAME"], $_ENV["MYSQL_USERNAME"], $_ENV["MYSQL_PASSWORD"]);
} catch (PDOException $exception) {
    echo "Connection failed: " . $exception->getMessage();
}

include_once __DIR__ . '/../../routes/web.php';

// Start the routing
try {
    SimpleRouter::start();
} catch (\Pecee\Http\Middleware\Exceptions\TokenMismatchException | \Pecee\SimpleRouter\Exceptions\HttpException | Exception $e) {
} catch (\Pecee\SimpleRouter\Exceptions\NotFoundHttpException $e) {
}