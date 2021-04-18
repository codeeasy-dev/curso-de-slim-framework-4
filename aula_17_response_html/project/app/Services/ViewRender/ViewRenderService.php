<?php

declare(strict_types=1);

namespace App\Services\ViewRender;

class ViewRenderService implements IViewRenderService
{
    public function render(string $file, array $data = []): string
    {
        ob_start();

        include __DIR__ . "/../../../resources/view/{$file}.php";
        $contents = ob_get_contents();

        ob_end_clean();

        return $contents;
    }
}
