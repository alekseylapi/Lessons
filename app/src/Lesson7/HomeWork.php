<?php

namespace Alekseylapi\Lessons\Lesson7;

use Alekseylapi\Lessons\Models\Dog;
use Alekseylapi\Lessons\Models\Master;

class HomeWork
{
    public static function buildMaster1(): Master
    {
        $dog1 = new Dog("Шарик1", "1991-10-21", "бульдог1", "male1", "Вася1");
        $dog2 = new Dog("Шарик2", "1991-10-22", "бульдог2", "male2", "Вася2");
        return new Master('Вася Иванов', '1985-05-15', '+79123456789', [$dog1, $dog2]);
    }

    public static function buildMaster2(): Master
    {
        $dog3 = new Dog("Шарик3", "1991-10-23", "бульдог3", "male3", "Вася3");
        $dog4 = new Dog("Шарик4", "1991-10-24", "бульдог4", "male4", "Вася4");
        $dog5 = new Dog("Шарик5", "1991-10-25", "бульдог5", "male5", "Вася5");
        return new Master('Петя Петров', '1990-08-20', '+79876543210', [$dog3, $dog4, $dog5]);
    }

    public static function printDogsInfo(Master $master): void
    {
        echo "Собаки хозяина {$master->name}:\n";
        foreach ($master->pets as $dog) {
            echo "- Имя: {$dog->name}, Порода: {$dog->breed}, Возраст: {$dog->getAge()} лет, Говорит: {$dog->say()}\n";
        }
    }
}