<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\HelloMessage\IHelloMessageService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProductsController
{
    public function __construct(
        private IHelloMessageService $helloServiceMessage,
    )
    {}

    public function get(Request $request, Response $response): Response
    {
        $response->getBody()->write($this->helloServiceMessage->getMessage());
        return $response;
    }
}
