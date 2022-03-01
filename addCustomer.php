<?php
// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nextCustomerID = 0;

while($row = mysqli_fetch_array($result))
{
   $nextCustomerID = $row['Email'];
}

$rowSQL = mysqli_query($con ,"SELECT MAX(Customer_ID) as max FROM project.customer" );
$row = mysqli_fetch_array( $rowSQL );
$nextCustomerID = $row['max'];
$nextCustomerID++;
 
function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$Customer_ID = $_POST["Customer_ID"];
$Name = $_POST["Name"];
$Phone_No = $_POST["Phone_No"];

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
        <form action="addCustomerDB.php" method="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Customer ID:<br> <label class="form-center"><?php echo $nextCustomerID;?> </label>
              <br>
              Phone Number:<br> <input type="text" name="pNum">
            </div>
            
            <div class ="form-center2">
                Customer Name:<br> <input type="text" name="cName">
                <br>
            </div>
            <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
    </div>

</body>
</html>