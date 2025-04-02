<?php

namespace Alekseylapi\Lessons\Models;

class Kitty extends Cat
{
    public function __construct(
        string $name,
        string $birthday,
        string $breed,
        string $sex,
        string $master,
        string $color = 'white',
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

    public function say(): string
    {
        return "me";
    }
}
