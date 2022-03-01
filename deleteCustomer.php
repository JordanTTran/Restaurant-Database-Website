<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $cID = $_SESSION["Customer_ID"];

	$sql = "DELETE FROM project.customer WHERE Customer_ID = $cID";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record deleted successfully!";
        header("Location: customer.php");
    } else {
        echo "Error!";
    }
}

?>