<?php

declare(strict_types=1);

namespace App\Services\ViewRender;

interface IViewRenderService
{
    public function render(string $file, array $data = []): string;
}
