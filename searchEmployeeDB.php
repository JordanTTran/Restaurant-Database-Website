<?php
session_start();
include_once("connection.php");

if (isset($_POST['find'])) {
    $Employee_ID = $_SESSION["Employee_ID"];
	$Name = $_POST["name"];
    echo "<meta http-equiv='refresh' content='2;url=individualEmployee.php?$Name' />";
}

mysqli_close($conn);
?>