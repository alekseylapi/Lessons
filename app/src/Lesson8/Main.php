<?php

namespace Alekseylapi\Lessons\Lesson8;

use Alekseylapi\Lessons\Models\Cat;
use Alekseylapi\Lessons\Models\Dog;
use Alekseylapi\Lessons\Models\Interfaces\Flyable;
use Alekseylapi\Lessons\Models\Kitty;
use Alekseylapi\Lessons\Models\Nightingale;
use Alekseylapi\Lessons\Models\Parrot;
use Alekseylapi\Lessons\Models\Pet;

class Main
{
    public static function interfaces(): void
    {
        $dog1 = new Dog(
            'Sharik',
            "2020-03-19",
            "Taxa",
            "M",
            "Vasya",
        );
        $cat1 = new Cat(
            'Barsik',
            "2020-03-19",
            "Siam",
            "M",
            "Vasya",
        );
        $kitty1 = new Kitty(
            'Musya',
            "2025-03-19",
            "Siam",
            "F",
            "Vasya"
        );
        $parrot1 = new Parrot(
            'Naruto',
            "2025-03-19",
            "Ara",
            "F",
            "Vasya"
        );
        $solovey1 = new Nightingale(
            'Solovey',
            "2025-03-19",
            "Solovey",
            "F",
            "Vasya"
        );

        $pets = [
            $cat1,
            $dog1,
            $kitty1,
            $parrot1,
            $solovey1,
        ];
        self::flyIfCan($pets);

    }

    public static function petInfo(Pet $pet): void
    {
        echo "name: " . $pet->name, PHP_EOL;
        echo "breed: " . $pet->breed, PHP_EOL;
        echo "age: " . $pet->getAge(), PHP_EOL;
        echo "color: " . $pet->color, PHP_EOL;
        echo "say: " . $pet->say(), PHP_EOL;
    }

    /**
     * @param Pet[] $pets
     */
    public static function flyIfCan(array $pets): void
    {
        foreach ($pets as $pet) {
            if ($pet instanceof Flyable) {
                self::fly500($pet);
            }
        }
    }

    public static function fly500(Flyable $flyable): void
    {
        $flyable->fly(500);
    }
}
