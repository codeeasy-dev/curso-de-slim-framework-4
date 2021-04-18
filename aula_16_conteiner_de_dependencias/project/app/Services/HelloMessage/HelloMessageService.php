<?php

declare(strict_types=1);

namespace App\Services\HelloMessage;

class HelloMessageService implements IHelloMessageService
{
    public function getMessage(): string
    {
        return 'Hello world!';
    }
}
