<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $Event_No = $_SESSION["Event_No"];
	$Event_Name = $_POST["Event_Name"];
    $Event_Date = $_POST["Event_Date"];
    

    $sql = "UPDATE project.event SET Event_Date = '$Event_Date',Event_Name='$Event_Name' WHERE Event_No = $Event_No";

    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: events.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>