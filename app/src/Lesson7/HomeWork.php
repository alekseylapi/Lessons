<?php

namespace Alekseylapi\Lessons\Lesson7;

use Alekseylapi\Lessons\Models\Dog;
use Alekseylapi\Lessons\Models\Master;

class HomeWork
{
    public static function buildMaster1(): Master
    {
        $master = new Master('Вася Иванов', '1985-05-15', '+79123456789', []);
        $master->pets[] = new Dog("Шарик1", "1991-10-21", "бульдог1", "male1", $master);
        $master->pets[] = new Dog("Шарик2", "1991-10-22", "бульдог2", "male2", $master);
        return $master;
    }

    public static function buildMaster2(): Master
    {
        $master = new Master('Петя Петров', '1990-08-20', '+79876543210', []);
        $master->pets[] = new Dog("Шарик3", "1991-10-23", "бульдог3", "male3", $master);
        $master->pets[] = new Dog("Шарик4", "1991-10-24", "бульдог4", "male4", $master);
        $master->pets[] = new Dog("Шарик5", "1991-10-25", "бульдог5", "male5", $master);
        return $master;
    }

//2) Написать функцию, которая выводит информацию по всем собака хозяина(которого передали через параметр)
    public static function printDogsInfo(Master $master): void
    {
        echo "Собаки хозяина {$master->name}:" . PHP_EOL;
        foreach ($master->pets as $pet) {
            echo "- Имя: {$pet->name}, Порода: {$pet->breed}, Возраст: {$pet->getAge()} лет, Говорит: {$pet->say()}" . PHP_EOL;
        }
    }

// 3) Написать функцию, которая выводит информацию по всех хозяинам(которых передали через параметр)

    /**
     * @param Master[] $masters
     * @return void
     */
    public static function printMastersInfo(array $masters): void
    {
        foreach ($masters as $master) {
            echo "Хозяин: {$master->name}, Дата рождения: {$master->birthday}, Телефон: {$master->phone}" . PHP_EOL;
        }
    }

//4) Написать функцию, которая выводит информацию о Хозяине(по переданной собаке)
    public static function findMasterByDog(Dog $dog): void
    {
     echo $dog->master->name . PHP_EOL;
    }

//5) Написать функцию, которая выводит информацию о всех остальных собаках Хозяина(по переданной собаке)
    public static function printOtherDogs(Dog $dog): void
    {
        echo "Остальные собаки хозяина {$dog->master->name}:" . PHP_EOL;
        foreach ($dog->master->pets as $pet) {
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