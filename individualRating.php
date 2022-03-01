<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.rating");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Customer_ID']);
  }

$uri = $_SERVER['REQUEST_URI'];

$customerID = 0 ;

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $customerID = $value;
        break;
    }
}

//$result2 = mysqli_query($con,"SELECT * FROM project.supplier as p WHERE p.Distributer_Name ='Gordon_Food'");
$result2 = mysqli_query($con,"SELECT * FROM project.rating WHERE Customer_ID = $customerID" );

while($row = mysqli_fetch_array($result2)) {
    $Customer_ID = $row["Customer_ID"];
    $Score = $row["Score"];
    $Comment = $row["Comment"];
}

$_SESSION["Customer_ID"] = $Customer_ID;
$_SESSION["Score"] = $Score;
$_SESSION["Comment"] = $Comment;

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


        <a href="ratings.php" class="button"> Back to Ratings Page </a>
    </div>

    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Rating Information: </label>
        <br>
        <form form action="updateEventDB.php" method ="post"">
            <br>
            <div class="form-center">
                Customer ID:<br> <label class="form-center"><?php echo$Customer_ID ?> </label>
                <br>
                Score:<br> <input type="int" name="Score" value="<?php echo $Score?>">
                <br>
                Comment:<br> <input type="text" name="Comment" value="<?php echo $Comment?>">
                <br>
            </div>
        
        </form>


    </div>

</body>

</html>