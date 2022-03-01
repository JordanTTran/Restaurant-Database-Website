<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
	$cID = $_SESSION["Customer_ID"];
    $score = $_POST["score"];
    $bNo = $_POST["bNo"];
    $comment = $_POST["comment"];

	$sql = "INSERT INTO project.rating (Customer_ID, Branch_No, Score, Comment) VALUES ('$cID', '$bNo', '$score', '$comment')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: customer.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>