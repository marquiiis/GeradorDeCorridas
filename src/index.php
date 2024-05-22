<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\RaceController;

$controller = new RaceController();
$request = file_get_contents('php://input');
$response = $controller->handleRequest($request);

header('Content-Type: application/json');
echo json_encode($response);
