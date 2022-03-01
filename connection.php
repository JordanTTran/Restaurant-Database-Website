<?php
	$servername = "localhost";
	$dbname = "project";
	$username = "root";
	$password = "12345678";
    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if (!$conn) {
        echo "Could not connect" .mysql_error();
    }
?>