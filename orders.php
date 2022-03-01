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
mysqli_close($con);

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

<body>
  
  <!-- HEADER CLASS -->
  <div class="hero-bg">
      <section class ="top">
          <header>
              <a href="#">Who knew you could eat that many potatoes?</a>
          </header>

            <h1><span>View all orders</span> in one place</h1>

        </section>

        <a href="project.php" class ="button"> Home Page </a>
        <a href="addOrder.php" class ="button"> Add Order </a>
        
        <div class="form-container">
            <h2>Or Search for Order by Order Number:</h2>
            <form action="searchOrderDB.php" method ="post">
                <div class="form-center">
                    <br> <input type="searchbar" name="name">
                    <br>
                <input class="button" type="submit" name="find" value="Find Order"> 
                </div>
            </form>
        </div>
  </div>
  
    <section class="reg-bg">
    
        <div class="right-col">
            <br>
            <h1>All Orders:</h1>
            <?php 
            session_start();
            foreach ($arr as &$value) {
              echo "<a href='individualOrder.php?thing=$value' class='button' name = 'test' value = '$value'> '$value'</a>";
            }            
            ?>
        </div>
        

    </section>

    <script src='../javascript/script.js'></script>
</body>
</html>