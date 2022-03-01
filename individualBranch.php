
<?php
session_start();

// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project.branch");

$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Branch_No']);
  }

$uri = $_SERVER['REQUEST_URI'];

$branchNumber = 0 ;

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $branchNumber = $value;
        break;
    }
}
$result2 = mysqli_query($con,"SELECT * FROM project.branch WHERE Branch_No = $branchNumber" );
$result3 = mysqli_query($con,"SELECT * FROM project.address WHERE Branch_No = $branchNumber" );

while($row = mysqli_fetch_array($result2)) {
    $Branch_No = $row["Branch_No"];
    $Owner_ID = $row["Owner_ID"];
}

while($row = mysqli_fetch_array($result3)) {
    $Street_No = $row["Street_No"];
    $City = $row["City"];
    $Postal_Code = $row["Postal_Code"];
    $Province = $row["Province"];
}
$_SESSION["Branch_No"] = $Branch_No;
$_SESSION["Owner_ID"] = $Owner_ID;
$_SESSION["Street_No"] = $Street_No;
$_SESSION["City"] = $City;
$_SESSION["Postal_Code"] = $Postal_Code;
$_SESSION["Province"] = $Province;



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

              <div class="right-col">
                <a href="branchEmployees.php" class="button"> View Branch Employees </a>
                <a href="events.php" class="button"> View Branch Events </a>
                <a href="ratings.php" class="button"> View Branch Ratings </a>
                <a href="inventory.php" class="button"> View Branch Inventory </a>
                <a href="branchSuppliers.php" class="button"> View Branch Suppliers </a>
                <a href="menu.php" class="button"> View Branch Menu </a>
              </div>
              <label class="form-center">Branch Information: </label>
              <br>
              <form action="updateBranchDB.php" method="post">
                <br>
                <div class="form-center2">
                </div>
                <div class="form-center2">
                  Branch ID:<br> <label class="form-center"><?php echo $Branch_No?> </label>
                  <br>
                  City:<br> <input type="text" name="city" value="<?php echo $City?>">
                  <br>
                  Province:<br> <input type="text" name="province" value="<?php echo $Province?>">

                </div>
              
                <div class="form-center2">
                    <br>
                    <br>
                    <br>
                  Postal Code:<br> <input type="text" name="postalCode" value="<?php echo $Postal_Code ?>">
                  <br>
                  Street No:<br> <input type="text" name="streetNo" value="<?php echo $Street_No ?>">
                </div>
                
                <?php
                $user_role = $_SESSION['user_role'];
                if(strpos("manager", $user_role) !== false) {

                } else {
                  echo "<input class='button' type='submit' name='save' value='Save'>";
                }
                ?>
              </form>
              <br>
              <?php
                $user_role = $_SESSION['user_role'];
                if(strpos("manager", $user_role) !== false) {

                } else {
                  echo "<h2> OR DELETE THIS BRANCH:</h2> <form class='button' action='deleteBranchDB.php' method='post'> <input class='button' type='submit' name='submit' value='Delete Branch'> </form>";
                }
              ?>

              </div>
</body>
</html>