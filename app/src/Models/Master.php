<?php

namespace Alekseylapi\Lessons\Models;

class Master
{
    public string $name;
    public string $birthday;
    public string $phone;
    /**
     * @var Pet[]
     */
    public array $pets;

    public function __construct(
        string $name,
        string $birthday,
        string $phone,
        array $pets = []
    ) {
        $this->name = $name;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->pets = $pets;
    }

    /**
     * @return Pet[]
     */
    public function getPets(): array
    {
        return $this->pets;
    }

    public function addPet(Pet $pet): void
    {
        if (in_array($pet, $this->pets, true)) {
            return;
        }
        $this->pets[] = $pet;
        $pet->setMaster($this);
    }

    public function removePet(Pet $pet): void
    {
        $foundPetIndex = array_search($pet, $this->pets, true);
        if ($foundPetIndex !== false) {
            unset($this->pets[$foundPetIndex]);
            $pet->setMaster(null);
        }
    }
}