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
    )
    {}

    public function type(): void
    {
        $keyboard = new KeyboardRedragonKumara();

        echo "{$this->name}: {$keyboard->type()}\n";
    }
}

$p1 = new Person('Felipe');
$p1->type();
