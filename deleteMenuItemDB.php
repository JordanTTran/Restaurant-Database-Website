<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Name = $_SESSION["Name"];

    $sql = "DELETE FROM project.menu WHERE Name = '$Name'";
    $sql2 = "DELETE FROM project.drink WHERE Name = '$Name'";
    $sql3 = "DELETE FROM project.food WHERE Name = '$Name'";
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    if (mysqli_query($conn, $sql)) {
        echo "New record deleted successfully!";
        header("Location: menu.php");
    } else {
        echo "Error!";
    }
}

?>