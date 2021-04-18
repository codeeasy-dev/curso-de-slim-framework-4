<?php

declare(strict_types=1);

namespace App\Services\Twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigService implements ITwigService
{
    public function twig(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../../resources/view');
        $twig = new Environment($loader);

        return $twig;
    }
}
