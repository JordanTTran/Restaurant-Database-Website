
<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.orders");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Order_No']);
  }

$uri = $_SERVER['REQUEST_URI'];

$orderNumber = 0 ;

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $orderNumber = $value;
        break;
    }
}

//$result2 = mysqli_query($con,"SELECT * FROM project.supplier as p WHERE p.Distributer_Name ='Gordon_Food'");
$result2 = mysqli_query($con,"SELECT * FROM project.orders WHERE Order_No = $orderNumber" );

while($row = mysqli_fetch_array($result2)) {
    $Order_No = $row["Order_No"];
    $Order_Type = $row["Order_Type"];
    $Order_Date = $row["Order_Date"];
    $Employee_ID = $row["Employee_ID"];
    $Customer_ID = $row["Customer_ID"];
}
$_SESSION["Order_No"] = $Order_No;
$_SESSION["Order_Type"] = $Order_Type;
$_SESSION["Order_Date"] = $Order_Date;
$_SESSION["Employee_ID"] = $Employee_ID;
$_SESSION["Customer_ID"] = $Customer_ID;


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


        <a href="orders.php" class ="button"> Back to Order Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Order Information: </label>
        <br>
        <form action="updateOrderDB.php" method ="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Order No.:<br> <label class="form-center"><?php echo $Order_No?> </label>
              <br>
              <?php 

              if(strpos("online", $Order_Type) !== false){
                echo "
                <select name ='oType'>
                <option value ='in_person'>in_person </option> 
                <option selected='selected'value ='online'>online </option> 
                 </select>";
              } else {
                echo "
                <select name ='oType'>
                <option value ='in_person'>in_person </option> 
                <option value ='online'>online </option> 
                 </select>";
              }

              ?>

            </div>
            
            <div class ="form-center2">
                Order Date:<br> <label class="form-center" name ="orderDate"><?php echo $Order_Date?></label>
                <br>
            </div>
            <input class="button" type="submit" name="save" value="Save">
        </form>
        <br>

                      <h2> OR DELETE THIS ORDER:</h2>
                <form class="button" action="deleteOrderDB.php" method="post">
                  
                <input class="button" type="submit" name="submit" value="Delete Order"> 
                </form>
    </div>

</body>
</html>