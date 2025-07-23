<?php 
		session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
<?php
		if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		checkLogin($username, $password);
		}

		function checkLogin($username, $password){
		if($username == 'user' && $password == 'password'){
			$_SESSION['user'] = $username;

			header('Location: dashboard.php');
		exit();
		} else {
			header('Location: failed.php');
		exit();
}
}
?>

<main> 	
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
		<label for="username">Nom d'utilisateur</label>
		<input type="text" name='username' id="username" value='username'></input>
				<label for="password">Password</label>
		<input type="password" name='password' id="password" value='password'></input>
		<button type="submit" name="submit" value="submit">Submit</button>
        </form>
    </main>
</body>
</html>
