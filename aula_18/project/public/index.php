<?php

declare(strict_types=1);

use App\Controllers\ProductsController;
use App\Services\Twig\ITwigService;
use App\Services\Twig\TwigService;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
$container->set(ITwigService::class, new TwigService());
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get('/', ProductsController::class . ':get');

$app->run();
