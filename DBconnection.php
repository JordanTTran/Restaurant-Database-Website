<?php

$conn = "";

try {
	$servername = "localhost";
	$dbname = "project";
	$username = "root";
	$password = "12345678";

	$conn = new PDO(
		"mysql:host=$servername; dbname=project",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
