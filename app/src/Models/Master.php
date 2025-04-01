<?php

namespace Alekseylapi\Lessons\Models;

class Master
{
    public string $name;
    public string $birthday;
    public string $phone;
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
    
}