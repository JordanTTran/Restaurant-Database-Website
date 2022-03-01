
<?php
session_start();

//header("Content-Type: application/json");

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM project.supplier");
$Branch_No = $_SESSION["Branch_No"];

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Distributer_Name']);
  }



$uri = $_SERVER['REQUEST_URI'];

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
    $Supplier_No = $row["Supplier_No"];
    $Location = $row["Location"];
    $Distributer_Name = $row["Distributer_Name"];
    $Phone_Number = $row["Phone_Number"];
    $Branch_No = $row["Branch_No"];
}

$_SESSION["supplierNo"] = $Supplier_No;
$_SESSION["Location"] = $Location;
$_SESSION["Distributer_Name"] = $Distributer_Name;
$_SESSION["Phone_Number"] = $Phone_Number;
$_SESSION["Branch_No"] = $Branch_No;

//$myArr = ["Supplier_No: $Supplier_No", "Location: $Location", "Distributer_Name: $Distributer_Name", "Phone Number: $Phone_Number", "Branch_No: $Branch_No"];
/* $myArr = array(
  'Supplier_No:' => $Supplier_No,
  'Location'=> $Location,
  'Distributer_Name' => $Distributer_Name,
  'Phone_Number'=>$Phone_Number,
  'Branch_No'=>$Branch_No

);

echo json_encode($myArr); */

?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPSC471 Project</title>
    <meta name="description" content="CPSC471 final project dummy website.">

    <!-- LINK TO CSS -->
  <link rel="stylesheet" href="main.css">

</head>
<script src='../javascript/script.js'></script>
<body>
  <!-- your content here... -->
  

  <!-- HEADER CLASS -->
  <div class="hero-bg">
      <section class ="top">
          <header>
              <a href="#"restaurantdatabase</a>
          </header>
        </section>


        <a href="supplier.php" class ="button"> Back to Supplier Page </a>

  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Supplier Information: </label>
        <br>
        <form action="updateSupplierDB.php" method ="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Supplier ID:<br> <label class="form-center"><?php echo $Supplier_No?> </label>
              Distributer Name:<br> <input type="text" name="dName" value=<?php echo $Distributer_Name?>>
              <br>
            </div>
            
            <div class ="form-center2">
                Location:<br> <input type="text" name="location" value=<?php echo $Location?>>
                <br>
                Phone Number:<br> <input type="text" name="pNum" value=<?php echo $Phone_Number?>>
                <br>
            </div>
            <?php
                $user_role = $_SESSION['user_role'];
                if(strpos("manager", $user_role) !== false) {
                  if($_SESSION["User_Branch_No"] === $Branch_No) {
                    echo "<input class='button' type='submit' name='save' value='Save'>";
                 }
                } else {
                  echo "<input class='button' type='submit' name='save' value='Save'>";
                }
                ?>
            
        </form>
        <br>
        

                <?php
                $user_role = $_SESSION['user_role'];
                if(strpos("manager", $user_role) !== false) {
                  if($_SESSION["User_Branch_No"] === $Branch_No) {
                    echo "                <h2> OR DELETE THIS SUPPLIER:</h2>
                    <div class='form-center2'>
                    </div>
                    <div class='form-center2'>
                    </div>
                    <div class='form-center2'><form class='button' action='deleteSupplier.php' method='post'> <input class='button' type='submit' name='submit' value='Delete Supplier'> </form>";
                 }
                } else {
                  echo "                <h2> OR DELETE THIS SUPPLIER:</h2>
                  <div class='form-center2'>
                  </div>
                  <div class='form-center2'>
                  </div>
                  <div class='form-center2'><form class='button' action='deleteSupplier.php' method='post'> <input class='button' type='submit' name='submit' value='Delete Supplier'> </form>";
                }
                ?>


</div>
    </div>
    
</body>
</html>