<?php

declare(strict_types=1);

namespace App\Services\JsonRender;

use Psr\Http\Message\ResponseInterface as Response;

class JsonRenderService implements IJsonRenderService
{
    public function render(Response $response, array $data): Response
    {
        $json = json_encode($data, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

        $response->getBody()->write($json);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
