<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Order_No = $_SESSION["Order_No"];

	$sql = "DELETE FROM project.orders WHERE Order_No = $Order_No";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record deleted successfully!";
        header("Location: orders.php");
    } else {
        echo "Error!";
    }
}

?>