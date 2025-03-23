<?php

namespace Alekseylapi\Lessons\Lesson7;

use Alekseylapi\Lessons\Models\Cat;
use Alekseylapi\Lessons\Models\Dog;
use Alekseylapi\Lessons\Models\Kitty;
use Alekseylapi\Lessons\Models\Pet;

class Main
{
    public static function extending()
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

//        self::dogInfo($dog1);
//        self::catInfo($cat1);
//        self::kittyInfo($kitty1);

        self::petInfo($dog1);
        self::petInfo($cat1);
        self::petInfo($kitty1);
    }

    public static function petInfo(Pet $pet): void
    {
        echo "name: " . $pet->name, PHP_EOL;
        echo "breed: " . $pet->breed, PHP_EOL;
        echo "age: " . $pet->getAge(), PHP_EOL;
        echo "color: " . $pet->color, PHP_EOL;
        echo "say: " . $pet->say(), PHP_EOL;
    }

    public static function dogInfo(Dog $pet): void
    {
        echo "name: " . $pet->name, PHP_EOL;
        echo "breed: " . $pet->breed, PHP_EOL;
        echo "age: " . $pet->getAge(), PHP_EOL;
        echo "color: " . $pet->color, PHP_EOL;
        echo "say: " . $pet->say(), PHP_EOL;
    }

    public static function catInfo(Cat $pet): void
    {
        echo "name: " . $pet->name, PHP_EOL;
        echo "breed: " . $pet->breed, PHP_EOL;
        echo "age: " . $pet->getAge(), PHP_EOL;
        echo "color: " . $pet->color, PHP_EOL;
        echo "say: " . $pet->say(), PHP_EOL;
    }

    public static function kittyInfo(Kitty $pet): void
    {
        echo "name: " . $pet->name, PHP_EOL;
        echo "breed: " . $pet->breed, PHP_EOL;
        echo "age: " . $pet->getAge(), PHP_EOL;
        echo "color: " . $pet->color, PHP_EOL;
        echo "say: " . $pet->say(), PHP_EOL;
    }
}
