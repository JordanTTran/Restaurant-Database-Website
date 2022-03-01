<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $sNum = $_SESSION["supplierNo"];

	$sql = "DELETE FROM project.supplier WHERE Supplier_No = $sNum";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record deleted successfully!";
        header("Location: supplier.php");
    } else {
        echo "Error!";
    }
}

?>