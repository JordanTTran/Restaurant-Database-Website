<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.event");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Event_Name']);
  }

$uri = $_SERVER['REQUEST_URI'];

$eventName = "temp" ;

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $eventName = $value;
        break;
    }
}

//$result2 = mysqli_query($con,"SELECT * FROM project.supplier as p WHERE p.Distributer_Name ='Gordon_Food'");
$result2 = mysqli_query($con,"SELECT * FROM project.event WHERE Event_Name = '$eventName'" );

while($row = mysqli_fetch_array($result2)) {
    $Event_No = $row["Event_No"];
    $Event_Date = $row["Event_Date"];
    $Event_Name = $row["Event_Name"];
}

$result3 = mysqli_query($con,"SELECT * FROM project.hold WHERE Event_No = $Event_No" );

while($row = mysqli_fetch_array($result3)) {
    $Branch_No = $row["Branch_No"];
}


$_SESSION["Event_No"] = $Event_No;
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
        <section class="top">
            <header>
                <a href="#" restaurantdatabase</a>
            </header>
        </section>


        <a href="events.php" class="button"> Back to Events Page </a>
    </div>

    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Events Information: </label>
        <br>
        <form form action="updateEventDB.php" method ="post"">
            <br>
            <div class="form-center">
                Event ID:<br> <label class="form-center"><?php echo$Event_No ?> </label>
                <br>
                Event Date:<br> <input type="date" name="Event_Date" value="<?php echo $Event_Date?>">
                <br>
                Event_Name:<br> <input type="text" name="Event_Name" value="<?php echo $Event_Name?>">
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


    </div>

</body>

</html>