<!DOCTYPE html>
<html>
<body>

<?php
session_start();


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM project.supplier");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Distributer_Name']);
  }



$uri = $_SERVER['REQUEST_URI'];
echo $uri; 

$supplierName = 'temp';

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $supplierName = $value;
        break;
    }
}

//$result2 = mysqli_query($con,"SELECT * FROM project.supplier as p WHERE p.Distributer_Name ='Gordon_Food'");
$result2 = mysqli_query($con,"SELECT * FROM project.supplier WHERE Distributer_Name ='$supplierName'" );

while($row = mysqli_fetch_array($result2)) {
    $Supplier_No = $row["Supplier_No."];
    $Location = $row["Location"];
    $Distributer_Name = $row["Distributer_Name"];
    $Phone_Number = $row["Phone_Number"];
    $Branch_No = $row["Branch_Number"];
}

echo nl2br("\n");
echo $Supplier_No;
echo nl2br("\n");
echo $Location;
echo nl2br("\n");
echo $Distributer_Name;
echo nl2br("\n");
echo $Phone_Number;
echo nl2br("\n");
echo $Branch_No;


?> 

</body>
</html>
