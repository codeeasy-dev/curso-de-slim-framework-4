<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\ViewRender\IViewRenderService;

abstract class Controller
{
    public function __construct(
        protected IViewRenderService $viewRender,
    )
    {}
}
