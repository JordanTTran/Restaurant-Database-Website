<?php
session_start();
include_once("connection.php");

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Item_Name = $_POST["Item_Name"];
$Item_Quantity = $_POST["Item_Quantity"];
$Branch_No = $_POST["Branch_No"];
$Branch_No = $_SESSION["Branch_No"]; 

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


        <a href="inventory.php" class ="button"> Back to Inventory Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Inventory Information: </label>
        <br>
        <form action="addInventoryItemDB.php" method="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
                Item Name:<br> <input type="text" name="Name">
                <br>
            </div>
            
            <div class ="form-center2">
                Item Quantity:<br> <input type="text" name="quantity">
                <br>
                <br>
            </div>
            <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
    </div>
    
</body>
</html>