<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $Item_Name = $_SESSION["Item_Name"];
	$Item_Quantity = $_POST["quantity"];

    

    $sql = "UPDATE project.inventory SET Item_Quantity = $Item_Quantity WHERE Item_Name = '$Item_Name'";

    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: inventory.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>