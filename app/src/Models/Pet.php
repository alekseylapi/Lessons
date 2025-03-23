<?php

namespace Alekseylapi\Lessons\Models;

abstract class Pet
{
    public string $name;
    protected \DateTimeImmutable $birthday;
    public string $breed;
    public string $sex;
    public string $master;
    public string $color;

    public function __construct(
        string $name,
        string $birthday,
        string $breed,
        string $sex,
        string $master,
        string $color = 'brown',
    ) {
        $this->name = $name;
        $this->birthday = new \DateTimeImmutable($birthday);
        $this->breed = $breed;
        $this->sex = $sex;
        $this->master = $master;
        $this->color = $color;
    }

    public function getBirthday(): \DateTimeImmutable
    {
        return $this->birthday;
    }

    public function getAge(): int
    {
        return $this->birthday->diff(new \DateTime())->y;
    }

    abstract public function say(): string;
}
