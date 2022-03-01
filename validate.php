<?php
session_start();
include_once('DBconnection.php');


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {

	
	$uname = test_input($_POST["uname"]);
	$password = test_input($_POST["password"]);
	$signInSQL = mysqli_query($con, "SELECT * FROM project.sign_in");

	
	foreach($signInSQL as $user) {

        if(($user['username'] === $uname) &&
		    ($user['password'] === $password)) {

				
				$result = mysqli_query($con,"SELECT role as rol FROM project.sign_in  WHERE username ='$uname'");
				$row = mysqli_fetch_array( $result );
				$_SESSION['user_role'] =  $row['rol'];

				$result = mysqli_query($con,"SELECT Branch_No as br FROM project.sign_in  WHERE username ='$uname'");
				$row = mysqli_fetch_array( $result );
				$_SESSION['User_Branch_No'] =  $row['br'];
				
		 		header("Location: project.php");
		}
        else {
			echo "<script language='javascript'>";
			echo "alert('Invalid username or password')";
			echo "</script>";
		}
	}
}

?>
