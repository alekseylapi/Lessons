<?php

namespace Alekseylapi\Lessons\Lesson6;

use Alekseylapi\Lessons\Models\Dog;
use Alekseylapi\Lessons\Models\Master;

class Main
{
    public static function handle()
    {
//        self::dogVariables();
//        self::dogAssociativeArray();
//        self::dogStruct();
//        self::dogClass();
        self::dogEncapsulation();
    }

    public static function dogVariables(): void
    {
        $dog1Name = 'Sharik';
        $dog1Birthday = new \DateTimeImmutable("2020-03-19 00:00:00");
        $dog1Breed = "Taxa";
        $dog1Sex = "M";
        $dog1Master = "Vasya";

        $dog2Name = 'Tuzik';
        $dog2Birthday = new \DateTimeImmutable("2023-03-19 00:00:00");
        $dog2Breed = "Taxa";
        $dog2Sex = "M";
        $dog2Master = "Vasya";


        echo $dog1Birthday->diff(new \DateTimeImmutable())->y, PHP_EOL;
        echo $dog2Birthday->diff(new \DateTimeImmutable())->y, PHP_EOL;
    }

    public static function dogAssociativeArray(): void
    {
        $dogs = [];

        $dog1 = [
            'name' => 'Sharik',
            'birthday' => new \DateTimeImmutable("2020-03-19 00:00:00"),
            'breed' => "Taxa",
            'sex' => "M",
            'master' => "Vasya",
        ];
        $dogs[] = $dog1;

        $dog2 = [
            'name' => 'Tuzik',
            'birthday' => new \DateTimeImmutable("2023-03-19 00:00:00"),
            'breed' => "Taxa",
            'sex' => "M",
            'master' => "Vasya",
        ];
        $dogs[] = $dog2;

        foreach ($dogs as $dog) {
//            echo $dog['birthday']->diff(new \DateTime())->y, PHP_EOL;
            echo self::getDogAge($dog), PHP_EOL;
        }
    }

    public static function getDogAge(array $dog): int
    {
        return $dog['birthday']->diff(new \DateTime())->y;
    }

    public static function dogStruct(): void
    {
        $dogs = [];
        $dog1 = new Dog(
            'Sharik',
            "2020-03-19",
            "Taxa",
            "M",
            "Vasya",
        );
        $dogs[] = $dog1;

        $dog2 = new Dog(
            'Tuzik',
            "2023-03-19",
            "Taxa",
            "M",
            "Vasya",
        );
        $dogs[] = $dog2;

        foreach ($dogs as $dog) {
//            echo $dog->birthday->diff(new \DateTime())->y, PHP_EOL;
            echo self::getDogAge2($dog), PHP_EOL;
        }
    }

    public static function getDogAge2(Dog $dog): int
    {
        return $dog->getBirthday()->diff(new \DateTime())->y;
    }

    public static function dogClass(): void
    {
        $dogs = [];
        $dog1 = new Dog(
            'Sharik',
            "2020-03-19",
            "Taxa",
            "M",
            "Vasya",
        );
        $dogs[] = $dog1;

        $dog2 = new Dog(
            'Tuzik',
            "2023-03-19",
            "Taxa",
            "M",
            "Vasya",
        );
        $dogs[] = $dog2;

        foreach ($dogs as $dog) {
            echo $dog->name, ": ",
                $dog->getAge(), ", ",
                PHP_EOL;
        }
    }

    public static function dogEncapsulation(): void
    {
        $dog1 = new Dog(
            'Sharik',
            "2020-03-19",
            "Taxa",
            "M",
            "Vasya",
        );

        echo $dog1->getAge(), PHP_EOL;

        echo $dog1->getBirthday()->format("d.m.Y"), PHP_EOL;

        $birthday = $dog1->getBirthday();
        $anotherBirthday = $birthday->add(new \DateInterval("P1Y"));
//        $birthday = new \DateTimeImmutable("2022-12-22");
        echo $anotherBirthday->format("d.m.Y"), PHP_EOL;

        echo $dog1->getBirthday()->format("d.m.Y"), PHP_EOL;

        $dog2 = new Dog(
            'Tuzik',
            "2023-03-19",
            "Taxa",
            "M",
            "Vasya",
        );

        var_dump($dog1->isOlder($dog2));
//        echo $dog1->somePrivateFunction(), PHP_EOL;
    }

    public static function homework(): void
    {
        $master1 = new Master(
            'Иванов Иван Иванович',
            '1980-01-01',
            '1234567890',
            ['Бобик', 'Шарик']
        );
    }
}
