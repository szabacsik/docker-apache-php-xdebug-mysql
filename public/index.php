<?php

use App\Infrastructure\Registry;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/bootstrap.php';

/* @var $log Monolog\Logger */
$log = Registry::get('log');
$log->debug('started');

/* @var $pdo PDO */
$pdo = Registry::get('pdo');
$statement = $pdo->prepare("SELECT NOW();");
$statement->execute();
$result = $statement->fetchColumn();
echo json_encode($result);
