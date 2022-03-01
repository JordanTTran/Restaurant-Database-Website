<?php
include_once("connection.php");

if (isset($_POST['submit'])) {
	$dName = $_POST["dName"];
	$location = $_POST["location"];
    $pNum = $_POST["pNum"];
    $bNum = $_POST["bNum"];
    $rowSQL = mysqli_query($conn ,"SELECT MAX(Supplier_No) as max FROM project.supplier" );
    $row = mysqli_fetch_array( $rowSQL );
    $nextSupplierID = $row['max'];
    $nextSupplierID++;

	$sql = "INSERT INTO project.supplier (Supplier_No, Location, Distributer_Name, Phone_Number, Branch_No) VALUES ('$nextSupplierID', '$location', '$dName', '$pNum', '$bNum')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: supplier.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>