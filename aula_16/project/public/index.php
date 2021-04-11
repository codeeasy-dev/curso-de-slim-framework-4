<?php

declare(strict_types=1);

use App\Controllers\ProductsController;
use App\Services\HelloMessage\HelloMessageService;
use App\Services\HelloMessage\IHelloMessageService;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->set(IHelloMessageService::class, new HelloMessageService());
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get('/', ProductsController::class . ':get');

$app->run();
