<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.customer");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Name']);
  }



$uri = $_SERVER['REQUEST_URI'];

$cName = 'temp';

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $cName = $value;
        break;
    }
}

$result2 = mysqli_query($con,"SELECT * FROM project.customer WHERE Name ='$cName'" );

while($row = mysqli_fetch_array($result2)) {
    $Customer_ID = $row["Customer_ID"];
    $Name = $row["Name"];
    $Phone_No = $row["Phone_No"];
}
$_SESSION["Customer_ID"] = $Customer_ID;
$_SESSION["Name"] = $Name;
$_SESSION["Phone_No"] = $Phone_No;
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


        <a href="customer.php" class ="button"> Back to Customer Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Customer Information: </label>
        <br>
        <form action="updateCustomerDB.php" method="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Customer ID:<br> <label class="form-center"><?php echo $Customer_ID?> </label>
              <br>
              Phone Number:<br> <input type="text" name="pNum" value=<?php echo $Phone_No?>>
            </div>
            
            <div class ="form-center2">
              Customer Name:<br> <input type="text" name="cName" value=<?php echo $Name?>>
              <br>
            </div>
            <input class="button" type="submit" name="save" value="Save">
        </form>
        <br>
        <h2> OR ADD RATING:</h2>
        <a href="addRating.php" class="button"> Add Rating </a>

    <h2> OR DELETE THIS CUSTOMER:</h2>
        < <div class="form-center2">
                </div>
                <div class="form-center2">
                </div>
                <div class="form-center2">
                <form class="button" action="deleteCustomer.php" method="post">
                  
                  <input class="button" type="submit" name="submit" value="Delete Customer"> 
                </form>
    </div>

</body>
</html>