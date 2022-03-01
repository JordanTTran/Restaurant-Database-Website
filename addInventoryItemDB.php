<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Item_Name = $_POST["Name"];
    $Item_Quantity = $_POST["quantity"];
    $Branch_No = $_SESSION["Branch_No"]; 


    $sql = "INSERT INTO project.inventory (Item_Name, Item_Quantity, Branch_No) VALUES ('$Item_Name', $Item_Quantity, $Branch_No)";

    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: inventory.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>