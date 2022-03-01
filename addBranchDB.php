<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Street_No = $_POST["streetNum"];
    $City = $_POST["city"];
    $Postal_Code = $_POST["province"];
    $Province = $_POST["postalCode"];


    $nextBranchID = $_SESSION["next"];

	$sql = "INSERT INTO project.branch (Branch_No, Owner_ID) VALUES ($nextBranchID, 1234567890)";
	$sql2 = "INSERT INTO project.address (Branch_No, Street_No, City, Postal_Code, Province) VALUES ($nextBranchID,$Street_No, '$City', '$Postal_Code', '$Province')";
    

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        echo "New record added successfully!";
        header("Location: branch.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>