<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response as Psr7Response;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('');

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

$myMiddleware = function (Request $request, RequestHandler $handler): Response {
    $response = $handler->handle($request);
    $existingContent = (string) $response->getBody();

    $response = new Psr7Response();

    $response->getBody()->write('BEFORE<br/>' . $existingContent . '<br/>AFTER');

    return $response;
};

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

class JsonBodyParserMiddleware implements MiddlewareInterface
{
    public function process(Request $request, RequestHandler $handler): Response
    {
        $contentType = $request->getHeaderLine('Content-Type');

        if (strstr($contentType, 'application/json')) {
            $contents = json_decode(file_get_contents('php://input'), true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $request = $request->withParsedBody($contents);
            }
        }

        return $handler->handle($request);
    }
}

$app->add($myMiddleware)
    ->add(new JsonBodyParserMiddleware());

$app->get('/', function (Request $request, Response $response, array $args): Response {
    $response->getBody()->write("Hello world!");
    return $response;
})->add(new ExampleMiddleware());

$app->post('/', function (Request $request, Response $response): Response {
    $data = $request->getParsedBody();
    $response->getBody()->write($data['name']);
    return $response;
})->add(new ExampleMiddleware());

$app->run();
