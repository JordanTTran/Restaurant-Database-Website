<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $Order_No = $_SESSION["Order_No"];
	$Order_Type = $_POST["oType"];

    

    $sql = "UPDATE project.orders SET Order_Type='$Order_Type' WHERE Order_No = '$Order_No'";

    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: orders.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>