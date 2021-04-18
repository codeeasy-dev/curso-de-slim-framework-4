<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProductsController
{
    public function get(Request $request, Response $response): Response
    {
        $response->getBody()->write('Produto 01, ...');

        return $response;
    }

    public function store(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $name = $data['name'];
        $price = $data['price'];

        $response->getBody()
            ->write("Cadastrando o produto {$name} com o preço R$ {$price}");

        return $response;
    }
}
