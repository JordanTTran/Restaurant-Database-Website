<?php
session_start();

include_once("connection.php");

if (isset($_POST['submit'])) {
    $Employee_ID = $_SESSION["Employee_ID"];
    $Role = $_SESSION["Role"];

	$sql = "DELETE FROM project.employee WHERE Employee_ID = $Employee_ID";
    
    if(strpos("Cook", $Role) !== false) {
        $sqlRole = "DELETE FROM project.cook WHERE Employee_ID = $Employee_ID";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Bartender", $Role) !== false) {
        $sqlRole = "DELETE FROM project.bartender WHERE Employee_ID = $Employee_ID";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Host", $Role) !== false) {
        $sqlRole = "DELETE FROM project.host WHERE Employee_ID = $Employee_ID";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Server", $Role) !== false) {
        $sqlRole = "DELETE FROM project.server WHERE Employee_ID = $Employee_ID";
        mysqli_query($conn, $sqlRole);
    } elseif(strpos("Manager", $Role) !== false) {
        $sqlRole = "DELETE FROM project.manager WHERE Employee_ID = $Employee_ID";
        mysqli_query($conn, $sqlRole);
    }

    if (mysqli_query($conn, $sql)) {
        echo "New record deleted successfully!";
        header("Location: employee.php");
    } else {
        echo "Error!";
    }
}

?>