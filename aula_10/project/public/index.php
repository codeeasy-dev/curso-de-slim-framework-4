<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use GuzzleHttp\Psr7\LazyOpenStream;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->post('/rota01', function (Request $request, Response $response): Response {
    $data = $request->getParsedBody();

    echo "<pre>";
    var_dump($data);
    die;

    return $response;
});

$app->get('/rota02', function (Request $request, Response $response): Response {
    $response->getBody()->write("Retornando dados!");
    return $response;
});

$app->post('/rota03', function (Request $request, Response $response): Response {
    $data = $request->getParsedBody();

    $name = $data['name'];

    $response->getBody()->write("Hello {$name}!");

    return $response;
});

$app->get('/rota04', function (Request $request, Response $response): Response {
    $stream = new LazyOpenStream(__DIR__ . '/slim.png', 'r');

    $newResponse = $response->withBody($stream)
        ->withHeader('Content-Type', 'image/png');

    return $newResponse;
});

$app->get('/rota05', function (Request $request, Response $response): Response {
    $json = json_encode(['name' => 'Code Easy']);

    $response->getBody()->write($json);

    $newResponse = $response->withHeader('Content-Type', 'application/json');

    return $newResponse;
});

$app->get('/rota06', function (Request $request, Response $response): Response {
    $newResponse = $response->withHeader('Location', '/rota07')
        ->withStatus(302);

    return $newResponse;
});

$app->get('/rota07', function (Request $request, Response $response): Response {
    $response->getBody()->write('Fui redirecionado!');

    return $response;
});

$app->run();
