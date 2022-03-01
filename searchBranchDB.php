<?php
session_start();
include_once("connection.php");

if (isset($_POST['find'])) {
	$Branch_No = $_POST["name"];
    echo "<meta http-equiv='refresh' content='2;url=individualBranch.php?$Branch_No' />";
}

mysqli_close($conn);
?>