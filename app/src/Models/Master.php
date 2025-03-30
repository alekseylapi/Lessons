<?php

namespace Alekseylapi\Lessons\Models;


class Master
{

    public string $name;
    protected \DateTimeImmutable $birthDate;
    public string $phone;
    public array $pets;

    public function __construct(
        string $name,
        string $birthDate,
        string $phone,
        array $pets = []
    ) {
        $this->name = $name;
        $this->birthDate = new \DateTimeImmutable($birthDate);
        $this->phone = $phone;
        $this->pets = $pets;
    }


}