<?php

$output = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['name']) && !empty($_POST['name']) && $_POST['name'] !== ''){
		$name = $_POST['name'];
		$name = trim(htmlspecialchars($name, ENT_QUOTES));
		echo "Bonjour $name";
	}

}
