<?php

session_start();

$role = "";
if(isset($_SESSION['user']) && $_SESSION['user'] == 'user'){
	$role = "user";
} else {
	header('Location: connexion.php');
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<main> 				<p><?php echo "Bienvenue {$_SESSION['user']}, vous avez le rôle $role \n";?></p>
			<button><a href="logout.php">Deconnexion</a></button>
    </main>
</body>
</html>

