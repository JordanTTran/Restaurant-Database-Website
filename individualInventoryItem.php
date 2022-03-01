<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.inventory");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Item_Name']);
  }

$uri = $_SERVER['REQUEST_URI'];

$itemName = "temp" ;

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $itemName = $value;
        break;
    }
}


$result2 = mysqli_query($con,"SELECT * FROM project.inventory WHERE Item_Name = '$itemName'" );

while($row = mysqli_fetch_array($result2)) {
    $Item_Name = $row["Item_Name"];
    $Item_Quantity = $row["Item_Quantity"];
    $Branch_No = $row["Branch_No"];
}


$_SESSION["Item_Name"] = $Item_Name;
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


        <a href="inventory.php" class ="button"> Back to Inventory Page </a>

  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Inventory Information: </label>
        <br>
        <form action="updateInventoryItemDB.php"method ="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Item Name:<br> <label class="form-center"><?php echo $Item_Name?> </label>
              <br>
              Item Quantity:<br> <input type="text" name="quantity" value="<?php echo $Item_Quantity?>">
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
                        echo "<h2> OR DELETE THIS ITEM:</h2>
                        <form class='button' action='deleteInventoryItemDB.php' method='post'>
                        <input class='button' type='submit' name='submit' value='Delete Inventory'> 
                        </form>";
                     }
                    } else {
                    echo "<h2> OR DELETE THIS ITEM:</h2>
                    <form class='button' action='deleteInventoryItemDB.php' method='post'>
                    <input class='button' type='submit' name='submit' value='Delete Inventory'> 
                    </form>";
                    }
                    ?>
    </div>
    
</body>
</html>