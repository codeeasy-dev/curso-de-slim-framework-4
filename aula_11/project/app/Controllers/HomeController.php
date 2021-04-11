<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function __invoke(Request $request, Response $response): Response
    {
        $response->getBody()->write('Classe com invoke');

        return $response;
    }
}
