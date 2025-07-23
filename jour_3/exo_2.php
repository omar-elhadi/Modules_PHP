<?php

$form = [
  "nom" => "   ",
  "age" => "28",
  "email" => ""
];


foreach($form as $element => $value){
	$value = trim($value);
if(!isset($element)){
		echo "Erreur: $element est pas définie \n";
	} elseif (empty($value)){
		echo "Erreur: $element est vide \n";
	}
	else {
		echo "$element valide \n";
	}


if(is_numeric($value) && $value > 0){
	echo "Age et supérieur à 0 \n";
	}
}
