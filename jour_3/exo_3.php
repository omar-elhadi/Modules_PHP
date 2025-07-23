<?php

$panier = "Stylo:2.5, Cahier:4.25, gomme:abc, Table:42.99, chaise:14.9";

$items = explode(",", $panier);
$achats = array();

foreach($items as $item){
	$pair = explode(":", trim($item));
	
	if(count($pair) == 2){
		$name = trim($pair[0]);
		$price = trim($pair[1]);
		
		if(is_numeric($price)){
			$achats[$name] = floatval($price);
		} else {
			echo "Erreur: '$name' a un prix bizarre (pas un chiffre) '$price' - sauter\n";
		}
	}
}

echo "Shopping Cart:\n";
var_dump($achats);

$total = array_sum($achats);
echo "\nTotal: " . number_format($total, 2) . " €\n";
