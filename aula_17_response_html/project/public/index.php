<?php

declare(strict_types=1);

use App\Controllers\ProductsController;
use App\Services\ViewRender\IViewRenderService;
use App\Services\ViewRender\ViewRenderService;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->set(IViewRenderService::class, new ViewRenderService());
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->setBasePath('');

$app->get('/', ProductsController::class . ':get');

$app->run();
