<?php

namespace Alekseylapi\Lessons\Models;

class Master
{
    public string $fio;
    public \DateTimeImmutable $dateOfBirth;
    public string $phoneNumber;
    public array $pets;

    public function __construct(string $fio, string $dateOfBirth, string $phoneNumber, array $pets)
    {
        $this->fio = $fio;
        $this->dateOfBirth = new \DateTimeImmutable($dateOfBirth);
        $this->phoneNumber = $phoneNumber;
        $this->pets = $pets;

    }

// 2) Написать функцию, которая выводит информацию по всем собака хозяина(которого передали через параметр)
    public function getAlldogs($owner)
    {
        echo "Хозяина" . ($this->fio);
        foreach ($owner as $dogName) {
            echo ('Собаки') . ($this->$dogName);
        }
    }

}
