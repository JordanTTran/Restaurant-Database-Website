<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Branch_No = $_SESSION["Branch_No"];

	$sql = "DELETE FROM project.branch WHERE Branch_No = $Branch_No";
	$sql2 = "DELETE FROM project.address WHERE Branch_No = $Branch_No";

    
    if (mysqli_query($conn, $sql)&&mysqli_query($conn, $sql2)) {
        echo "New record deleted successfully!";
        header("Location: branch.php");
    } else {
        echo "Error!";
    }
}

?>