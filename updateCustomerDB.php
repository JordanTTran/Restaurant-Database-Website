<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $Customer_ID = $_SESSION["Customer_ID"];
	$cName = $_POST["cName"];
    $pNum = $_POST["pNum"];

    $sql = "UPDATE project.customer SET Name='$cName', Phone_No ='$pNum'WHERE Customer_ID = '$Customer_ID'";

    
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: customer.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>