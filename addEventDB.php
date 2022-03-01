<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Event_Name = $_POST["eventName"];
    $Event_Date = $_POST["date"];


    $nextEventNumber = $_SESSION["next"];
    $Branch_No = $_SESSION["Branch_No"];

    echo $Event_Name;

	$sql = "INSERT INTO project.event (Event_No, Event_Date, Event_Name) VALUES ($nextEventNumber, '$Event_Date', '$Event_Name')";
	$sql2 = "INSERT INTO project.holds (Event_No, Branch_No) VALUES ($nextEventNumber, $Branch_No)";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        echo "New record added successfully!";
        header("Location: orders.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>