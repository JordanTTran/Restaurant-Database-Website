<?php
session_start();
include_once("connection.php");

if (isset($_POST['find'])) {
	$Order_No = $_POST["name"];
    echo "<meta http-equiv='refresh' content='2;url=individualOrder.php?$Order_No' />";
}

mysqli_close($conn);
?>