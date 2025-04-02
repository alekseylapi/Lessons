<?php

namespace Alekseylapi\Lessons\Models;

use Alekseylapi\Lessons\Models\Interfaces\Flyable;

class Parrot extends Pet implements Flyable
{
    public function say(): string
    {
        return "chirik";
    }

    public function fly(int $distance): void
    {
        if ($distance > 300) {
            echo "i'm flying (300 meters, can't flying more)...", PHP_EOL;
        } else {
            echo "i'm flying ($distance meters)...", PHP_EOL;
        }
    }
}
