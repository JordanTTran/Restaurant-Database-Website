<?php
session_start();


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nextEmployeeID = 0;

$rowSQL = mysqli_query($con ,"SELECT MAX(Branch_No) as max FROM project.branch" );
$row = mysqli_fetch_array( $rowSQL );
$nextBranchID = $row['max'];
$nextBranchID++;


function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$_SESSION["next"] = $nextBranchID;


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


        <a href="branch.php" class ="button"> Back to Branch Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Branch Information: </label>
        <br>
        <form action="addBranchDB.php" method = "post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Branch ID:<br> <label class="form-center"><?php echo $nextBranchID ?> </label>
              <br>
            </div>
            
            <div class ="form-center2">
                Street Number:<br> <input type="text" name="streetNum">
                <br>
                City:<br> <input type="text" name="city">
                <br>
                Province:<br> <input type="text" name="province">
                <br>
                Postal Code:<br> <input type="text" name="postalCode">
                <br>
            </div>
            <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>

    </div>
    
</body>
</html>