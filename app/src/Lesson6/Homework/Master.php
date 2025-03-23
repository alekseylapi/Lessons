<?php

namespace Alekseylapi\Lessons\Lesson6\Homework;

class Master
{
    public $fio;
    public $dateOfBirth;
    public $phoneNumber;
    public $pets;

    public function __construct($fio,$dateOfBirth, $phoneNumber, $pets)
    {
        $this->fio = $fio;
        $this->dateOfBirth = $dateOfBirth;
        $this->phoneNumber = $phoneNumber;
        $this->pets = $pets;

    }
// 2) Написать функцию, которая выводит информацию по всем собака хозяина(которого передали через параметр)
    public function getAlldogs($owner)
    {
        echo "Хозяина" . ($this->fio);
        foreach ($owner as $dogName){
            echo ('Собаки') . ($this->$dogName);
        }
    }

}
