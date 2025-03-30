<?php

use Alekseylapi\Lessons\Models\Master;

require __DIR__ . '/vendor/autoload.php';

//\Alekseylapi\Lessons\Lesson6\Main::handle();

//echo \Alekseylapi\Lessons\Lesson4\Main::task13(54321);

//Alekseylapi\Lessons\Lesson7\Main::extending();
// Создаем собак
$master1 = \Alekseylapi\Lessons\Lesson7\HomeWork::buildMaster1();
$master2 = \Alekseylapi\Lessons\Lesson7\HomeWork::buildMaster2();
\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master1);
\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master2);