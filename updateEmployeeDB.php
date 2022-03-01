<?php
session_start();
include_once("connection.php");

if (isset($_POST['save'])) {

    $EmployeeName = $_POST["employeeName"];
	$SIN = $_POST["SIN"];
	$wage = $_POST["wage"];
    $role = $_POST["role"];
    $liquor_license = $_POST["liquor_license"];
    
    $Employee_ID = $_SESSION["Employee_ID"];

    $Old_Role = $_SESSION["Role"];
    echo $Old_Role;

    $sql = "UPDATE project.employee SET Name='$EmployeeName', SIN ='$SIN', Wage ='$wage'WHERE Employee_ID = '$Employee_ID'";
    
    /*   //If role was changed, update role 
    if(strpos($Old_Role, $role) === false) {
        
        $oldResult = mysqli_query($con,"SELECT * FROM project.'$Old_Role' WHERE Employee_ID =$Employee_ID" );
        $newResult = mysqli_query($con,"SELECT * FROM project.'$role' WHERE Employee_ID =$Employee_ID" );

        $sql = "UPDATE project.supplier SET Distributer_Name='$dName', Location ='$location', Phone_Number ='$pNum'WHERE Supplier_No = '$supplierNum'";

    } */

    //If bartender add 
    if(strpos("Bartender", $role) !== false) {
        
    }
    
    if (mysqli_query($conn, $sql)) {
        echo "Updated record successfully!";
        header("Location: employee.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>