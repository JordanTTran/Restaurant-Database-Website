
<?php
session_start();
// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$result = mysqli_query($con,"SELECT * FROM project.menu");

$arr = array();

while($row = mysqli_fetch_array($result))
  {

  array_push($arr, $row['Name']);
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
              <a href="#">the best potato menu in the nation</a>
          </header>

        <h1><span>Wow! You have some nice</span> menu</h1>
        </section>


        <a href="individualBranch.php" class ="button"> Back to Branch </a>
        <?php
        $user_role = $_SESSION['user_role'];
        if(strpos("manager", $user_role) !== false) {
            if($_SESSION["User_Branch_No"] === $Branch_No) {
                echo "<a href='addMenuItem.php' class ='button'> Add Menu Item </a>";
            }
        } else {
          echo "<a href='addMenuItem.php' class ='button'> Add Menu Item </a>";
        }
    ?>
        <div class="form-container">
        </div>

  </div>

    <section class="reg-bg">
    
        <div class="right-col">
            <br>
            <h1>Menu List:</h1>
            <?php 
            session_start();
            foreach ($arr as &$value) {
              echo "<a href='individualMenuItem.php?thing=$value' class='button' name = 'test' value = '$value'> '$value'</a>";
            }            
            ?>
        </div>
    </section>
  
  
    <script src='../javascript/script.js'></script>
</body>
</html>