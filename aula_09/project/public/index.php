<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$routeCollector = $app->getRouteCollector();
$routeCollector->setCacheFile(__DIR__ . '/cache.php');

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Retornando dados!");
    return $response;
});

$app->get('/route/{id}', function (Request $request, Response $response, array $args): Response {
    $id = $args['id'];

    $response->getBody()->write("ID = {$id}!");
    return $response;
});

$app->run();
