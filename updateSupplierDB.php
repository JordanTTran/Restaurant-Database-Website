<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $supplierNum = $_SESSION["supplierNo"];
	$dName = $_POST["dName"];
	$location = $_POST["location"];
    $pNum = $_POST["pNum"];
    $bNum = $_POST["bNum"];
    

    $sql = "UPDATE project.supplier SET Distributer_Name='$dName', Location ='$location', Phone_Number ='$pNum'WHERE Supplier_No = '$supplierNum'";

    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: supplier.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>