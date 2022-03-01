<?php
session_start();
include_once("connection.php");

if (isset($_POST['find'])) {
    $supplierNum = $_SESSION["supplierNo"];
	$dName = $_POST["distributerName"];
    echo "<meta http-equiv='refresh' content='2;url=individualSupplier.php?$dName' />";
}

mysqli_close($conn);
?>