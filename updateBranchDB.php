<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $Branch_No = $_SESSION["Branch_No"];
	$City = $_POST["city"];
    $Province = $_POST["province"];
    $Postal_Code = $_POST["postalCode"];
    $Street_No = $_POST["streetNo"];
    echo $Street_No;

    $sql = "UPDATE project.address SET Street_No ='$Street_No', City = '$City', Postal_Code ='$Postal_Code', Province ='$Province' WHERE Branch_No = '$Branch_No'";

    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: branch.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>