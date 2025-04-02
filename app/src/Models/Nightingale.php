<?php

namespace Alekseylapi\Lessons\Models;

use Alekseylapi\Lessons\Models\Interfaces\Flyable;

class Nightingale extends Pet implements Flyable
{
    public function say(): string
    {
        return "sssss";
    }

    public function fly(int $distance): void
    {
        echo "i'm flying ($distance meters)...", PHP_EOL;
    }
}
