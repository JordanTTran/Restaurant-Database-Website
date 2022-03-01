<?php
session_start();
include_once("connection.php");

if (isset($_POST['submit'])) {
    $Name = $_POST["employeeName"];
    $SIN = $_POST["SIN"];
    $Wage = $_POST["wage"];
    $Role = $_POST["role"];
    $Liquor_License_Number = $_POST["liquorLicenseNum"];
    $Branch_Number = $_POST["bNum"];


    $nextEmployeeID = $_SESSION["next"];

	$sql = "INSERT INTO project.employee (Employee_ID, SIN, Name, Wage, Branch_No) VALUES ('$nextEmployeeID', '$SIN', '$Name', '$Wage', '$Branch_Number')";
    //$sqlRole = "INSERT INTO project.'$Role' (Employee_ID) VALUES ('$nextEmployeeID')";
     if(strpos("Cook", $Role) !== false) {
        $sqlRole = "INSERT INTO project.cook (Employee_ID) VALUES ('$nextEmployeeID')";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Bartender", $Role) !== false) {
        $sqlRole = "INSERT INTO project.bartender (Employee_ID, `Liquor_License _Number`) VALUES ('$nextEmployeeID', '$Liquor_License_Number')";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Host", $Role) !== false) {
        $sqlRole = "INSERT INTO project.host (Employee_ID) VALUES ('$nextEmployeeID')";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Server", $Role) !== false) {
        $sqlRole = "INSERT INTO project.server (Employee_ID, `Liquor_License _Number`) VALUES ('$nextEmployeeID', '$Liquor_License_Number')";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Manager", $Role) !== false) {
        $sqlRole = "INSERT INTO project.manager (Employee_ID) VALUES ('$nextEmployeeID')";
        mysqli_query($conn, $sqlRole);
    }
    

    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
        header("Location: employee.php");
    } else {
        echo "Error!";
    }
}

mysqli_close($conn);
?>