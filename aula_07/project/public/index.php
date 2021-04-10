<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Retornando dados!");
    return $response;
});

$app->delete('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Deletando dados!");
    return $response;
});

$app->post('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Inserindo dados!");
    return $response;
});

$app->put('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Alterando dados!");
    return $response;
});

$app->patch('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Alterando dados parcialmente!");
    return $response;
});

$app->post('/with-body', function (Request $request, Response $response, array $args): Response {
    $params = (array)$request->getParsedBody();

    $name = $params['name'];

    $response->getBody()->write("Hello {$name}");
    return $response;
});

$app->run();
