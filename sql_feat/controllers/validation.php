<?php
session_start();
require '../models/userModel.php';

function validate_form(array $post): array
{
    $errors = [];

    if (empty($post['email'])) {
        $errors[] = "L'email est obligatoire.";
    }
    if (empty($post['password'])) {
        $errors[] = "Le mot de passe est obligatoire.";
    }
    if (empty($post['confirm-password'])) {
        $errors[] = "Confirmez votre mot de passe.";
    }

    if (!empty($errors)) {
        return $errors;
    }

    $email = trim($post['email']);
    $password = $post['password']; 
    $confirm_password = $post['confirm-password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Mot de passe trop court (minimum 8 caractères).";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Les deux mots de passe ne sont pas identiques.";
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error_message'] = "Erreur: La méthode de requête n'est pas autorisée.";
    header('Location: ../index.php');
    exit;
}

$errors = validate_form($_POST);

if (empty($errors)) {
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    require_once '../config/db.php';
	$result = createUser($pdo, $_POST['email'], $password_hash);
	if ($result) {
        $_SESSION['success_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
		header('Location: ../pages/login.php');
		exit;
	} else {
        $_SESSION['error_message'] = "Échec de la création de l'utilisateur. L'utilisateur existe peut-être déjà.";
        $_SESSION['form_data'] = $_POST; // Keep form data
		header('Location: ../index.php');
        exit;
	}
} else {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST; // Keep form data
    header('Location: ../index.php');
    exit;
}
