<?php

namespace Alekseylapi\Lessons\Models;

class Cat extends Pet
{
    public function __construct(
        string $name,
        string $birthday,
        string $breed,
        string $sex,
        string $master,
        string $color = 'black',
    ) {
        parent::__construct(
            $name,
            $birthday,
            $breed,
            $sex,
            $master,
            $color,
        );
    }

    public function isOlder(Cat $cat2): bool
    {
        return $this->birthday > $cat2->birthday;
    }

    public function say(): string
    {
        return "meow";
    }
}
