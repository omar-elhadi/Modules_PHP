<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$color = $_POST['color'] ?? null;
	$style = checkColor($color);
	if ($style) {
		echo "<h2>Vous avez choisi la couleur<span  style='{$style}'> {$_POST['color']} </span></h2>";
	}
}


function checkColor($color){
	if(!empty(trim($color)) && isset($color)){
		$output = match($color){
			'red' => 'color: red;',
			'yellow' => 'color: yellow;',
			'blue' => 'color: blue;',
			default => '',
		};
		return $output;
	} else {
		echo "Color invalide";
		return '';
	}
}

