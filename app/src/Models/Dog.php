<?php

namespace Alekseylapi\Lessons\Models;

class Dog
{
    public string $name;
    private \DateTimeImmutable $birthday;
    public string $breed;
    public string $sex;
    public string $master;

    public function __construct(string $name, string $birthday, string $breed, string $sex, string $master)
    {
        $this->name = $name;
        $this->birthday = new \DateTimeImmutable($birthday);
        $this->breed = $breed;
        $this->sex = $sex;
        $this->master = $master;
    }

    public function getBirthday(): \DateTimeImmutable
    {
        return $this->birthday;
    }

    public function getAge(): int
    {
        return $this->birthday->diff(new \DateTime())->y;
    }

    public function isOlder(Dog $dog2): bool
    {
        return $this->birthday > $dog2->birthday;
    }
}
