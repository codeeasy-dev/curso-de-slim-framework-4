<?php

interface IKeyboard
{
    public function type(): string;
}

class KeyboardRedragonKumara implements IKeyboard
{
    public function type(): string
    {
        return 'TEC TEC TEC...';
    }
}

class KeyboardMultilaser implements IKeyboard
{
    public function type(): string
    {
        return 'tec silencioso...';
    }
}

// ===========================================

class Person
{
    public function __construct(
        private string $name,
        private ?IKeyboard $keyboard = null,
    )
    {}

    public function type(): void
    {
        echo "{$this->name}: {$this->keyboard?->type()}\n";
    }
}

$p1 = new Person('Felipe', new KeyboardRedragonKumara());
$p1->type();

$p2 = new Person('John Doe', new KeyboardMultilaser());
$p2->type();
