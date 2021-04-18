<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\ProductsController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('');

$app->get('/products', ProductsController::class . ':get');
$app->post('/product', ProductsController::class . ':store');

$app->get('/', HomeController::class);

$app->run();
