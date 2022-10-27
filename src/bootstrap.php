<?php

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Infrastructure\Registry;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

$hostname = gethostname();

$log = new Logger("app [$hostname]");
$log->setTimezone(new DateTimeZone('Europe/Budapest'));
$log->pushHandler(new StreamHandler(__DIR__ . '/../reports/app.log', Logger::toMonologLevel(Level::Debug)));
$log->debug('started');

//$servername = "127.0.0.1";
$servername = "db";
$database = "DATABASE";
$username = "root";
$password = "PASSWORD";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $exception) {
    $log->critical($exception);
}

Registry::set('log', $log);
Registry::set('pdo', $pdo ?? null);
