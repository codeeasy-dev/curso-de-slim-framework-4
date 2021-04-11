<?php

declare(strict_types=1);

use App\Middlewares\CorsMiddleware;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->add(new CorsMiddleware());

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();
