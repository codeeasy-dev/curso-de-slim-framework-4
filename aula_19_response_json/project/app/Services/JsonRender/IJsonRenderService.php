<?php

declare(strict_types=1);

namespace App\Services\JsonRender;

use Psr\Http\Message\ResponseInterface as Response;

interface IJsonRenderService
{
    public function render(Response $response, array $data): Response;
}
