<?php
include_once("connection.php");

if (isset($_POST['submit'])) {
	$cName = $_POST["cName"];
    $pNum = $_POST["pNum"];
    $rowSQL = mysqli_query($conn ,"SELECT MAX(Customer_ID) as max FROM project.customer" );
    $row = mysqli_fetch_array( $rowSQL );
    $nextCustomerID = $row['max'];
    $nextCustomerID++;

	$sql = "INSERT INTO project.customer (Customer_ID, Name, Phone_No) VALUES ('$nextCustomerID', '$cName', '$pNum')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: customer.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>