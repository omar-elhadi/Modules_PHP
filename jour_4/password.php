<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['password']) && isset($_POST['confirm-password'])) {
		$pass = $_POST['password'];
		$confirmPass = $_POST['confirm-password'];
		echo checkPassword($pass, $confirmPass);
	} else {
		echo "Method error";
	}
} else {
	echo "Method isn't post";
}



function checkPassword($password, $confirmPassword) {
	
    if (!empty($password)) {
		if (strlen($password) < 6){
			echo "Mot de passe trop court";
			exit();
		} else if($password !== $confirmPassword){
			echo "Les deux mots de passe ne sont pas identiques";
			exit();
		} else {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		return "Votre mot de pass est: $hashed_password";
		}
	} else {
		echo "Entrez ou confirmez votre mot de pass s'il vous plait";
		exit();
	}
}

