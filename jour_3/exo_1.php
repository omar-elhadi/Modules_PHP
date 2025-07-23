<?php

$chaine = "12,5,abc,32,-7,42";

$chaine = explode(",", $chaine);
$newArray = array();

foreach($chaine as $str){
	is_numeric($str) && array_push($newArray, round($str));
}

var_dump($newArray);

echo "\n\n";

print_r(max($newArray));

echo "\n\n";
print_r(min($newArray));
