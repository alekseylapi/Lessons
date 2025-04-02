<?php

use Alekseylapi\Lessons\Models\Master;

require __DIR__ . '/vendor/autoload.php';

$master1 = \Alekseylapi\Lessons\Lesson7\HomeWork::buildMaster1();
$master2 = \Alekseylapi\Lessons\Lesson7\HomeWork::buildMaster2();
$masters = [$master1, $master2];
$dog = $master2->pets[0];

//\Alekseylapi\Lessons\Lesson6\Main::handle();
//Ale//echo \Alekseylapi\Lessons\Lesson4\Main::task13(54321);kseylapi\Lessons\Lesson7\Main::extending();
//\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master1);
//\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master2);
//\Alekseylapi\Lessons\Lesson7\HomeWork::printMastersInfo([$master1]);
//\Alekseylapi\Lessons\Lesson7\HomeWork::findMasterByDog($dog);
\Alekseylapi\Lessons\Lesson7\HomeWork::printOtherDogs($dog);
//echo "До передачи:\n";
//\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master1);
//\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master2);
//
//\Alekseylapi\Lessons\Lesson7\HomeWork::transferDog($dog, $master1, $master2);
//
//echo "\nПосле передачи:\n";
//\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master1);
//\Alekseylapi\Lessons\Lesson7\HomeWork::printDogsInfo($master2);