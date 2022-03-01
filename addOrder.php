<?php
session_start();


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nextEmployeeID = 0;

$rowSQL = mysqli_query($con ,"SELECT MAX(Order_No) as max FROM project.orders" );
$row = mysqli_fetch_array( $rowSQL );
$nextOrderID = $row['max'];
$nextOrderID++;


function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Order_No = $_POST["Order_No"];
$Order_Type = $_POST["Order_Type"];
$Order_Date = $_POST["Order_Date"];
$Employee_ID = $_POST["Employee_ID"];
$Customer_ID = $_POST["Customer_ID"];
$_SESSION["next"] = $nextOrderID;


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


        <a href="orders.php" class ="button"> Back to Orders Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Order Information: </label>
        <br>
        <form action="addOrderDB.php" method ="post">
            <br>
            <div class="form-left">
              Order No:<br> <label class="form-center"><?php echo $nextOrderID ?> </label>
              <br>
              <select name ="oType">
                <option value ="in_person">in_person </option> 
                <option value ="online">online </option> 

              </select>

              <!--  Order Type:<br> <input type="text" name="oType">-->
              <br>
            </div>
            
            <div class="form-left">
                Order Date:<br> <input type="date" name="oDate">
                <br>
                <br>
                Employee ID:<br> <input type="int" name="employeeID">
                <br>
            </div>
            <div class="form-left">

              Customer ID:<br> <input type="int" name="customerID">

          </div>
          <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
    </div>
    
</body>
</html>