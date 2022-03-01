<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Name = $_POST["itemName"];
    $Price = $_POST["price"];
    $checkDrink = $_POST["checkDrink"];
    $Volume = $_POST["volume"];
    $Alcohol_Content = $_POST["alcoholContent"];


    
    if(strpos("on", $checkDrink) !== false) {

        $sql = "INSERT INTO project.menu (Name, Price, Inventory_Item_Name) VALUES ('$Name', $Price, 'banana')";
        $sql2 = "INSERT INTO project.drink (Menu_Name, Volume, Alcohol_Content) VALUES ('$Name', $Volume, $Alcohol_Content)";

    } else {
        $sql = "INSERT INTO project.menu (Name, Price, Inventory_Item_Name) VALUES ('$Name', $Price, 'banana')";
        $sql2 = "INSERT INTO project.food (Menu_Name) VALUES ('$Name')";
    }


    if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql2) ) {
        echo "New record added successfully!";
        header("Location: menu.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>