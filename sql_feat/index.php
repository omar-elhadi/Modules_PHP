<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$form_data = $_SESSION['form_data'] ?? [];
$error_message = $_SESSION['error_message'] ?? '';

unset($_SESSION['errors']);
unset($_SESSION['form_data']);
unset($_SESSION['error_message']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>
<main> 	
    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

	<form method="post" action="./controllers/validation.php"> 
		<label for="email">Email: </label>
		<input type="text" name='email' id="email" value='<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>'></input>
		<label for="password">Mot de passe:</label>
		<input type="password" name='password' id="password" value=''></input>
		<label for="confirm-password">Confirmation de mot de passe</label>
		<input type="password" name='confirm-password' id="confirm-password" value=''></input>
		<button type="submit" name="submit" value="submit">Submit</button>
        </form>
    </main>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p><a href="./controllers/logout.php">Déconnexion</a></p>
    <?php endif; ?>
</body>
</html>
