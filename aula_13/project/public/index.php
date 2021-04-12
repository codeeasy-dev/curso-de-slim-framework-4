<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response as Psr7Response;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('');

$myMiddleware = function (Request $request, RequestHandler $handler): Response {
    $response = $handler->handle($request);
    $existingContent = (string) $response->getBody();

    $response = new Psr7Response();

    $response->getBody()->write('BEFORE<br/>' . $existingContent . '<br/>AFTER');

    return $response;
};

$app->add($myMiddleware);

class ExampleMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();

        $response = new Psr7Response();

        $response->getBody()->write('BEFORE WITH CLASS<br/>' . $existingContent . '<br/>AFTER WITH CLASS');

        return $response;
    }
}

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Hello world!");
    return $response;
})->add(new ExampleMiddleware());

$app->run();
