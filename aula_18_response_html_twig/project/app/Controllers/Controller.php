<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\Twig\ITwigService;
use Twig\Environment;

abstract class Controller
{
    protected Environment $twig;

    public function __construct(
        private ITwigService $twigService,
    )
    {
        $this->twig = $twigService->twig();
    }
}
