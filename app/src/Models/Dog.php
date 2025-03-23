<?php

namespace Alekseylapi\Lessons\Models;

class Dog extends Pet
{
    public function isOlder(Dog $dog2): bool
    {
        return $this->birthday > $dog2->birthday;
    }

    public function say(): string
    {
        return "Wow";
    }
}
