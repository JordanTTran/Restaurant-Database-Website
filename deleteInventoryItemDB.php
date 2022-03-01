<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {

    $Item_Name = $_SESSION["Item_Name"];

    

    $sql = "DELETE FROM project.inventory WHERE Item_Name = '$Item_Name'";

    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: inventory.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>