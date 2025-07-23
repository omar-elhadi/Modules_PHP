<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>

<?php
		
$output = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
			
if(isset($_POST['name']) && !empty($_POST['name']) && $_POST['name'] !== ''){
		$name = $_POST['name'];
		$name = trim(htmlspecialchars($name, ENT_QUOTES));
		$output = "Bonjour $name";
	}
}
?>
	
<main> 	
		<form method="post" action="traitement.php"> 
		<label for="name">Nom: </label>
            <input type="text" name="name" id="name">
				<button type="submit" name="submit" value="submit"></button>
        </form>
    </main>
</body>
</html>
