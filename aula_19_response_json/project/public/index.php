<?php

declare(strict_types=1);

use App\Services\JsonRender\IJsonRenderService;
use App\Services\JsonRender\JsonRenderService;
use App\Controllers\ProductsController;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->set(IJsonRenderService::class, new JsonRenderService());
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->setBasePath('');

$app->get('/', ProductsController::class . ':get');

$app->run();
