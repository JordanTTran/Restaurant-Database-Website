<?php
session_start();
include_once("connection.php");

if (isset($_POST['find'])) {
	$Name = $_POST["name"];
    echo "<meta http-equiv='refresh' content='2;url=individualEvent.php?$Name' />";
}

mysqli_close($conn);
?>