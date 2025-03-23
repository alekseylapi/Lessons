<?php

use Alekseylapi\Lessons\Lesson6\Homework\Master;

$OwnerData = [
    'fullName' => 'Иванов Иван Иванович',
    'birthDate' => '1980-01-01',
    'phoneNumber' => '1234567890',
    'pets' => ['Бобик', 'Шарик']
];

$master1 = new Master($OwnerData);