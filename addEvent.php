<?php
session_start();


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nextEventNumber = 0;

$rowSQL = mysqli_query($con ,"SELECT MAX(Event_No) as max FROM project.event" );
$row = mysqli_fetch_array( $rowSQL );
$nextEventNumber = $row['max'];
$nextEventNumber++;

$Branch_No = $_SESSION["Branch_No"];
function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Event_Date = $_POST["Event_Date"];
$Event_Name = $_POST["Event_Name"];

$_SESSION["next"] = $nextEventNumber;


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


        <a href="events.php" class ="button"> Back to Events </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Event Information: </label>
        <br>
        <form action="addEventDB.php" method ="post">
          <br>
          <div class="form-center">
              Event ID:<br> <label class="form-center"><?php echo $nextEventNumber?> </label>
              <br>
              Name:<br> <input type="text" name="eventName" value="">
              <br>
              Date:<br> <input type="date" name="date" >
              <br>
          </div>
          <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
        
    </div>

</body>
</html>