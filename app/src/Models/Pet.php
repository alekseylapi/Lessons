<?php

namespace Alekseylapi\Lessons\Models;

abstract class Pet
{
    public string $name;
    protected \DateTimeImmutable $birthday;
    public string $breed;
    public string $sex;
    private ?Master $master = null;
    public string $color;

    public function __construct(
        string $name,
        string $birthday,
        string $breed,
        string $sex,
        string $color = 'brown',
    ) {
        $this->name = $name;
        $this->birthday = new \DateTimeImmutable($birthday);
        $this->breed = $breed;
        $this->sex = $sex;
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

    public function getMaster(): Master
    {
        return $this->master;
    }

    public function setMaster(?Master $newMaster): void
    {
        if ($this->master === $newMaster) {
            return ;
        }

        $oldMaster = $this->master;
        if ($oldMaster !== null) {
            $oldMaster->removePet($this);
        }
        $this->master = $newMaster;
        if ($this->master !== null) {
            $this->master->addPet($this);
        }
    }

    abstract public function say(): string;
}
