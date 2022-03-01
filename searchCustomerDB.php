<?php
session_start();
include_once("connection.php");

if (isset($_POST['find'])) {
    $Customer_ID = $_SESSION["Customer_ID"];
	$cName = $_POST["cName"];
    echo "<meta http-equiv='refresh' content='2;url=individualCustomer.php?$cName' />";
}

mysqli_close($conn);
?>