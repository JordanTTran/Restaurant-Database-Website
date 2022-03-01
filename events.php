
<?php
session_start();
// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$Branch_No = $_SESSION["Branch_No"];

$result = mysqli_query($con,"SELECT * FROM project.holds as h, project.event as e WHERE Branch_No = $Branch_No AND h.Event_No = e.Event_No");

$arr = array();

while($row = mysqli_fetch_array($result))
  {

  array_push($arr, $row['Event_Name']);
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
    <section class="top">
      <header>
        <a href="#">The pototo lover events</a>
      </header>
  
      <h1><span>Wow! You have some nice</span> Events</h1>
    </section>
  
  
    <a href="project.php" class="button"> Home Page </a>
    <?php
        $user_role = $_SESSION['user_role'];
        if(strpos("manager", $user_role) !== false) {
            if($_SESSION["User_Branch_No"] === $Branch_No) {
                echo "<a href='addEvent.php' class ='button'> Add Event </a>";
            }
        } else {
          echo "<a href='addEvent.php' class ='button'> Add Event </a>";
        }
    ?>

    

                <div class="form-container">
                  <h2>Or Search for Event by Name:</h2>
                  <form action="searchEventDB.php" method ="post">
                    <div class="form-center">
                      <br> <input type="searchbar" name="name">
                      <br>
                      <input class="button" type="submit" name="find" value="Find Event By Name"> 
                    </div>
                  </form>
                </div>
  
  </div>

    <section class="reg-bg">
    
        <div class="right-col">
            <br>
            <h1>Event List:</h1>
          
            <?php 
            session_start();
            foreach ($arr as &$value) {
              echo "<a href='individualEvent.php?thing=$value' class='button' name = 'test' value = '$value'> '$value'</a>";
            }            
            ?>
        </div>
    
    </section>
  
  
    <script src='../javascript/script.js'></script>
</body>