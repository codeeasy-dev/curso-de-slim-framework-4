<?php

declare(strict_types=1);

namespace App\Services\HelloMessage;

interface IHelloMessageService
{
    public function getMessage(): string;
}
