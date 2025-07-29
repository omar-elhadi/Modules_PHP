<?php
session_start();
require '../models/userModel.php';
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs.";
        header('Location: ../pages/login.php');
        exit;
    }

    $user = verifyUser($pdo, $email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['success_message'] = "Connexion réussie!";
        header('Location: ../pages/dashboard.php'); // Redirect to a dashboard or home page
        exit;
    } else {
        $_SESSION['error_message'] = "Email ou mot de passe incorrect.";
        header('Location: ../pages/login.php');
        exit;
    }
} else {
    $_SESSION['error_message'] = "Méthode de requête non autorisée.";
    header('Location: ../pages/login.php');
    exit;
}
?>
