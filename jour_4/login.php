<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['password'])) {
		$pass = $_POST['password'];
		$id =  $_POST['id'];
		echo checkPassword($pass, $id);
	} else {
		echo "Method error";
	}
} else {
	echo "Method isn't post";
}



function checkPassword($password, $id) {
	
	$hash = '$2y$10$8YJ7sUUnl.VUSfnQHzqmQOxvZkfm1ioni0VCK506dZvW3QWzeM6je';
	
	if ($id !== 'admin'){
	echo "ok";
		return "Erreur, vous etes pas admin pour avoir acces";
		exit();
	} elseif ($password !== 'secret123' && !password_verify($password, $hash)){
		return "Erreur, le mot de pass incorrecte";
		exit();
	} else {
		return "acces garanti";
		exit();
	}

}

