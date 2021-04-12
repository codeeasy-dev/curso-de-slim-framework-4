<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\JsonRender\IJsonRenderService;

abstract class Controller
{
    public function __construct(
        protected IJsonRenderService $jsonRender,
    )
    {}
}
