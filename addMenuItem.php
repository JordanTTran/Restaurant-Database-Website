<?php
session_start();


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

$Name = $_POST["Name"];
$Price = $_POST["Price"];
$Inventory_Item_Name = $_POST["Inventory_Item_Name"];
$Volume = $_POST["Volume"];
$Alcohol_Content = $_POST["Alcohol_Content"];


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


        <a href="menu.php" class ="button"> Back to Menu Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Menu Item Information: </label>
        <br>
        <form action="addMenuItemDB.php" method="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Item Name:<br> <input type="text" name="itemName" >
              <br>
              Price:<br> <input type="int" name="price" >
            </div>
            
            <div class ="form-center2">
                Drink?<input type ="checkbox" name="checkDrink" >
            
            Volume:<br> <input type="int" name="volume" >
                <br>
                Alcohol Content:<br> <input type="int" name="alcoholContent" >
            </div>
            <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
        
    </div>

</body>
</html>