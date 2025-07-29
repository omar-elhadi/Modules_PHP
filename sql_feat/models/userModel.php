<?php


function getUser(PDO $pdo, string $email){
	try{
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$statement->bindValue(":email", $email);
		$statement->execute();
		$user = $statement->fetch(PDO::FETCH_ASSOC);
		return $user ?: null;
	}catch(PDOException $e ){
		error_log("Erreur finding user:  $e->getMessage()");
		die("Erreur finding user:  $e->getMessage()");
	}
}

function createUser(PDO $pdo, string $email, string $password): bool {

		if(getUser($pdo,$email ) !== null) {
        error_log("Attempt to create a user that already exists: $email");
        return false;
    }
	
    try {
        $statement = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES (:email, :password)");
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $success = $statement->execute();
        return $success;
    } catch (PDOException $e) {
        error_log("Database error on user creation: " . $e->getMessage());
        return false;
    }
}

function verifyUser(PDO $pdo, string $email, string $password): ?array {
    $user = getUser($pdo, $email);
    if ($user && password_verify($password, $user['password_hash'])) {
        return $user;
    }
    return null;
}
