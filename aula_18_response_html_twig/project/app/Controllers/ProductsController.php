<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProductsController extends Controller
{
    public function get(Request $request, Response $response): Response
    {
        $content = $this->twig->render('home.twig', ['name' => 'John Doe']);

        $response->getBody()->write($content);
        return $response;
    }
}
