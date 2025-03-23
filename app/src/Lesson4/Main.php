<?php

namespace Alekseylapi\Lessons\Lesson4;

class Main
{
    // 2)проверить по 3-м длинам сторон треугольника, что он прямоугольный(с помощью теоремы Пифагора)
// Пример:
// Входные данные:
// $l1 = 3
// $l2 = 4
// $l3 = 5
// Возвращаемое значение:
// true - т.е. Треугольник со сторонами 3, 4, 5 является прямоугольным
    public static function isRectangular(float $l1, float $l2, float $l3): bool
    {
        $sides = [$l1, $l2, $l3];
        sort($sides);
        // a^2 + b^2 = c^2
        return pow($sides[0], 2) + pow($sides[1], 2) === pow($sides[2], 2);
    }

// 3) найти расстояние между двумя точками на плоскости (x1, y1) и (x2, y2)
// Пример:
// Входные данные:
// $x1 = 1
// $y1 = 1
// $x2 = 4
// $y2 = 5
// Возвращаемое значение:
// 5
    public static function distance(int $x1, int $y1, int $x2, int $y2): float
    {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

// 4) по 3 координатам проверить что они являются треугольником
// Пример1:
// Входные данные:
// $x1 = 1
// $y1 = 1
// $x2 = 2
// $y2 = 2
// $x3 = 3
// $y3 = 3
// Возвращаемое значение:
// false - Переданные точки не являются вершинами треугольника
    public static function isTriangle(int $x1, int $y1, int $x2, int $y2, int $x3, int $y3): bool
    {
        // Рассчитать длины сторон
        $l1 = self::distance($x1, $y1, $x2, $y2);
        $l2 = self::distance($x1, $y1, $x3, $y3);
        $l3 = self::distance($x2, $y2, $x3, $y3);

        return (($l1 + $l3 > $l2) && ($l1 + $l2 > $l3) && ($l3 + $l2 > $l1));
    }

// 5) проверить, по координатам 3-х вершин треугольника, что он прямоугольный
// Пример:
// Входные данные:
// $x1 = 1
// $y1 = 1
// $x2 = 1
// $y2 = 5
// $x3 = 4
// $y3 = 5
// Возвращаемое значение:
// true - Треугольник является прямоугольным
    public static function task5(int $x1, int $y1, int $x2, int $y2, int $x3, int $y3): bool
    {
        $l1 = self::distance($x1, $y1, $x2, $y2);
        $l2 = self::distance($x1, $y1, $x3, $y3);
        $l3 = self::distance($x2, $y2, $x3, $y3);

        return self::isRectangular($l1, $l2, $l3);
    }

//6) Вычислить среднее арифметическое 2-х чисел
//Пример:
//Входные данные:
//$a = 2
//$b = 5
//Возвращаемое значение:
//3.5
    public static function arithmeticMean(int $num1, int $num2): float
    {
        return ($num1 + $num2) / 2;
    }

// 7)Вычислить среднее арифметическое чисел массива
// Пример:
// Входные данные:
// [1,2,3,4,5]
// Возвращаемое значение:
// 3
    public static function task7(array $array): ?float
    {
        if (empty($array)) {
            return null;
        }
        $sum = 0;
        foreach ($array as $value) {
            $sum += $value;
        }
        return $sum / count($array);
    }

//8) Вычислить среднее медианное чисел массива (см. функцию sort)
//Пример:
//Входные данные:
//[3,4,2,5,1]
//Возвращаемое значение:
//3
    public static function task8(array $array): ?float
    {
        if (empty($array)) {
            return null;
        }

        // Сортируем массив по возрастанию
        sort($array);

        // Вычисляем количество элементов в массиве
        $count = count($array);

        // Вычисляем индекс среднего элемента
        $middleIndex = (int)($count / 2);

        // Если количество элементов нечётное, возвращаем средний элемент
        if ($count % 2 !== 0) {
            return $array[$middleIndex];
        } else {
            // Если количество элементов чётное, возвращаем среднее арифметическое двух центральных элементов
            return ($array[$middleIndex - 1] + $array[$middleIndex]) / 2;
        }
    }

//9) Вывести 0-й разряд числа (т.е. Самую правую цифру)
//Пример:
//Входные данные:
//$a = 54321
//Возвращаемое значение:
//1
    public static function task9(int $a): int
    {
        return $a % 10;
    }

//Делить число на 10 пока не станет 0
//10) Вывести количество разрядов числа (т.е. количество цифр)
//Пример:
//Входные данные:
//$a = 54321
//Возвращаемое значение:
//5 // число состоит из 5 цифр
    public static function digitsCount(int $number): int
    {
        $count = 0;
        if ($number == 0) {
            return 1;
        }
        while ($number !== 0) {
            $count++;
            $number = (int)($number / 10);
        }
        return $count;
    }

//11) Вывести n-й разряд числа
//Пример:
//Входные данные:
//$a = 54321
//$n = 3
//Возвращаемое значение:
//4 // (нумерация разрядов справа налево, начиная с 0, т.е. При n = 3 надо вывести четвёртую цифру справа)
    public static function task11(int $a, int $n): int
    {
        return ((int)($a / pow(10, $n))) % 10;
    }

//12) Вычислить сумму всех цифр числа
//Пример:
//Входные данные:
//$a = 54321
//Возвращаемое значение:
//15 // 5 + 4 + 3 + 2 + 1 = 15
    public static function task12(int $number): int
    {
        $sum = 0;
        while ($number !== 0) {
            $sum += $number % 10;
            $number = (int)($number / 10);
        }
        return $sum;
    }

//13) Развернуть число, т.е. вывести цифры в обратном порядке
//Пример:
//Входные данные:
//$a = 54321
//Возвращаемое значение:
//12345
// реализация как в таск 12

    public static function task13( int $number) : int
    {
        $reversed = 0;
        while ($number !==0){
            $lastDigit = $number % 10;
            $reversed = $reversed * 10 + $lastDigit;
            $number = (int)($number / 10);
        }
        return $reversed;
    }

}