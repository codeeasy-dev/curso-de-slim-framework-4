<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('');

$app->addRoutingMiddleware();

$customErrorHandler = function (
    Request $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails,
    ?LoggerInterface $logger = null
) use ($app) {
    $logger?->error($exception->getMessage());

    $response = $app->getResponseFactory()->createResponse();

    $code = $exception->getCode();
    if ($code === 404) {
        $payload = "<h1>404 - Página não encontrada!</h1>";
        $response->getBody()->write($payload);
    } else {
        $payload = "Erro desconhecido.";
        $response->getBody()->write($payload);
    }

    return $response;
};

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();
