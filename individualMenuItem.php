<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.menu");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Name']);
  }

$uri = $_SERVER['REQUEST_URI'];

$menuName = "temp" ;

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $menuName = $value;
        break;
    }
}


$result2 = mysqli_query($con,"SELECT * FROM project.menu WHERE Name = '$menuName'" );

while($row = mysqli_fetch_array($result2)) {
    $Name = $row["Name"];
    $Price = $row["Price"];
    $Inventory_Item_Name = $row["Inventory_Item_Name"];
}
$result3 = mysqli_query($con,"SELECT * FROM project.drink WHERE Menu_Name = '$Name'" );


while($row = mysqli_fetch_array($result3)) {
    $Volume = $row["Volume"];
    $Alcohol_Content = $row["Alcohol_Content"];
}


$_SESSION["Name"] = $Name;
$_SESSION["Event_Date"] = $Event_Date;
$_SESSION["Event_Name"] = $Event_Name;


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
        <form action="">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Item Name:<br> <input type="text" name="oType" value="<?php echo $Name?>">
              <br>
              Price:<br> <input type="text" name="oType" value="<?php echo $Price?>">
            </div>
            
            <div class ="form-center2">
                Volume:<br> <input type="text" name="oDate" value="<?php echo $Volume?>">
                <br>
                Alcohol Content:<br> <input type="text" name="oDate" value="<?php echo $Alcohol_Content?>">
            </div>

        </form>
        <br>
        <?php
                    $user_role = $_SESSION['user_role'];
                    if(strpos("manager", $user_role) !== false) {
                      if($_SESSION["User_Branch_No"] === $Branch_No) {
                        echo "<h2>DELETE THIS ITEM:</h2>
                        <form class='button' action='deleteMenuItemDB.php' method='post'>
                        <input class='button' type='submit' name='submit' value='Delete Item'> 
                        </form>";
                     }
                    } else {
                        echo "<h2> DELETE THIS ITEM:</h2>
                        <form class='button' action='deleteMenuItemDB.php' method='post'>
                        <input class='button' type='submit' name='submit' value='Delete Item'> 
                        </form>";
                    }
                    ?>
    </div>
    
</body>
</html>