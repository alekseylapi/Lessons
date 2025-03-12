<?php

namespace Alekseylapi\Lessons\Lesson5\Functions;

use Alekseylapi\Lessons\Lesson4\Main as Lesson4Main;
use Alekseylapi\Lessons\Lesson5\Main;

class Functions
{
    public function foo()
    {
        $main = new Main();
        $main4 = new Lesson4Main();

        echo Lesson4Main::foo();
    }
}
