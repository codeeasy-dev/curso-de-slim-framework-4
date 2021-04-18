<?php

class KeyboardRedragonKumara
{
    public function type(): string
    {
        return 'TEC TEC TEC...';
    }
}

// ================================

class Person
{
    public function __construct(
        private string $name,
        private ?KeyboardRedragonKumara $keyboard = null,
    )
    {}

    public function type(): void
    {
        echo "{$this->name}: {$this->keyboard?->type()}\n";
    }
}

$p1 = new Person('Felipe', new KeyboardRedragonKumara());
$p1->type();
