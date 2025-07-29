<?php

$envDir = file_exists(__DIR__ . '/../.env.local') ?
__DIR__ .'/../.env.local' :
__DIR__ . '/../.env';

$envPath = parse_ini_file($envDir);

$host = $envPath['DB_HOST'];
$db = $envPath['DB_NAME'];
$user = $envPath['DB_USER'];
$password = $envPath['DB_PASSWORD'];


try {
	$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
	die("Erreur de connexion: " . $e->getMessage());
}
