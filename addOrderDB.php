<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Order_Type = $_POST["oType"];
    $Order_Date = $_POST["oDate"];
    $Employee_ID = $_POST["employeeID"];
    $Customer_ID = $_POST["customerID"];


    $nextOrderID = $_SESSION["next"];

	$sql = "INSERT INTO project.orders (Order_No, Order_Type, Order_Date, Employee_ID, Customer_ID) VALUES ('$nextOrderID', '$Order_Type', '$Order_Date', '$Employee_ID', '$Customer_ID')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: events.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>