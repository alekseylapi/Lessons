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

//2) Написать функцию, которая выводит информацию по всем собака хозяина(которого передали через параметр)
    public static function printDogsInfo(Master $master): void
    {
        echo "Собаки хозяина {$master->name}:" . PHP_EOL;
        foreach ($master->pets as $dog) {
            echo "- Имя: {$dog->name}, Порода: {$dog->breed}, Возраст: {$dog->getAge()} лет, Говорит: {$dog->say()}" . PHP_EOL;
        }
    }

// 3) Написать функцию, которая выводит информацию по всех хозяинам(которых передали через параметр)
    public static function printMastersInfo(array $masters): void
    {
        foreach ($masters as $master) {
            echo "Хозяин: {$master->name}, Дата рождения: {$master->birthday}, Телефон: {$master->phone}" . PHP_EOL;
        }
    }

//4) Написать функцию, которая выводит информацию о Хозяине(по переданной собаке)
    public static function findMasterByDog(Dog $dog, array $masters): ?Master
    {
        foreach ($masters as $master) {
            if (in_array($dog, $master->pets, true)) {
                return $master;
            }
        }
        return null;
    }

//5) Написать функцию, которая выводит информацию о всех остальных собаках Хозяина(по переданной собаке)
    public static function printOtherDogs(Master $master, Dog $dog): void
    {
        echo "Остальные собаки хозяина {$master->name}:" . PHP_EOL;
        foreach ($master->pets as $pet) {
            if ($pet !== $dog) {
                echo "- Имя: {$pet->name}, Порода: {$pet->breed}, Возраст: {$pet->getAge()} лет" . PHP_EOL;
            }
        }
    }


//6) Написать функцию передачи собаки от одного Хозяина к другому
    public static function transferDog(Dog $dog, Master $from, Master $to): void
    {
        $from->pets = array_filter($from->pets, fn($pet) => $pet !== $dog);
        $to->pets[] = $dog;
        echo "Собака {$dog->name} передана от {$from->name} к {$to->name}." . PHP_EOL;
    }
}
