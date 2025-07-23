<?php


if($_SERVER['REQUEST_METHOD'] == 'GET'){
	echo checkText($_GET['text']);
}


function checkText($text){
	$text = htmlspecialchars($text);
	if(!empty(trim($text)) && isset($text)){
		return $text;
	} else {
		echo "Characters invalides";
	}
}
