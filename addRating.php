<?php
session_start();
// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


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
        <label class="form-center">Rating Information: </label>
        <br>
        <form action="addRatingDB.php" method="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
                Customer ID:<br> <label class="form-center"><?php echo $_SESSION["Customer_ID"];?> </label>
              <br>
                Score:<br> <input type="text" name="score">
                <br>
            </div>
            
            <div class ="form-center2">
                Branch Number:<br> <input type="text" name="bNo">
                <br>
                Comment:<br> <input type="text" textarea rows = "4" cols = "25" name = "comment"></textarea><br>
                <br>
                
            </div>
            <input class="button" type="submit" name="submit" value="Add Rating!">

        </form>
        <br>
    </div>
    
</body>
</html>