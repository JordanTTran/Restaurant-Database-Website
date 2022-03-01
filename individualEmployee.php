
<?php
session_start();


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM project.employee");
$Branch_No = $_SESSION["Branch_No"];
$arr = array();

while($row = mysqli_fetch_array($result))
  {
  array_push($arr, $row['Name']);
  }

$uri = $_SERVER['REQUEST_URI'];

$employeeName = 'temp';

foreach ($arr as &$value) {
    if(strpos($uri, $value)) {
        $employeeName = $value;
        break;
    }
}

//$result2 = mysqli_query($con,"SELECT * FROM project.supplier as p WHERE p.Distributer_Name ='Gordon_Food'");
$result2 = mysqli_query($con,"SELECT * FROM project.employee WHERE Name ='$employeeName'" );

while($row = mysqli_fetch_array($result2)) {
    $Employee_ID = $row["Employee_ID"];
    $SIN = $row["SIN"];
    $Name = $row["Name"];
    $Wage = $row["Wage"];
    $Branch_No = $row["Branch_No"];
}
$_SESSION["Employee_ID"] = $Employee_ID;
$_SESSION["SIN"] = $SIN;
$_SESSION["Name"] = $Name;
$_SESSION["Wage"] = $Wage;
$_SESSION["Branch_No"] = $Branch_No;

$cookResult = mysqli_query($con,"SELECT * FROM project.cook WHERE Employee_ID =$Employee_ID" );
$hostResult = mysqli_query($con,"SELECT * FROM project.host WHERE Employee_ID =$Employee_ID" );
$serverResult = mysqli_query($con,"SELECT * FROM project.server WHERE Employee_ID =$Employee_ID" );
$managerResult = mysqli_query($con,"SELECT * FROM project.manager WHERE Employee_ID =$Employee_ID" );
$bartenderResult = mysqli_query($con,"SELECT * FROM project.bartender WHERE Employee_ID = $Employee_ID" );

$Role = "N/A";
$Liquor_License_Number = "N/A";

if($cookResult->num_rows != 0) {
    $Role = "Cook";
} elseif($hostResult->num_rows != 0) {
    $Role = "Host";
} elseif($serverResult->num_rows != 0) {
    $Role = "Server";
    $row = mysqli_fetch_array($serverResult);
    $Liquor_License_Number = $row["Liquor_License _Number"];
} elseif($managerResult->num_rows != 0) {
    $Role = "Manager";
} elseif($bartenderResult->num_rows != 0) {
    $Role = "Bartender";
    $row = mysqli_fetch_array($bartenderResult);
    $Liquor_License_Number = $row["Liquor_License _Number"];
} else {
    //Do nothing
}

$_SESSION["Role"] = $Role;

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


        <a href="employee.php" class ="button"> Back to Employee Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Employee Information: </label>
        <br>
        <form action="updateEmployeeDB.php" method="post">
            <br>
            <div class="form-left">
              Employee ID:<br> <label class="form-center"><?php echo $Employee_ID?>  </label>
              <br>
              Name:<br> <input type="text" name="employeeName" value =<?php echo $Name?> >
              <br>
              SIN:<br> <input type="text" name="SIN"  value = <?php echo $SIN?>>
              <br>
            </div>
            
            <div class ="form-left">
              <br>  
              <br>    
              <br>
              Wage:<br> <input type="text" name="wage" value = <?php echo $Wage?>>
              <br>
              Role:<br> <input type="text" name="role" value =<?php echo $Role?>>
              <br>
          </div>
          <div class ="form-left">
            <br>  
            <br>    
            <br>
            Liquor License Number:<br> <input type="text" name ="liquor_license"value=<?php echo $Liquor_License_Number?> > 
            <br>
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

                  
                  <?php
                    $user_role = $_SESSION['user_role'];
                    if(strpos("manager", $user_role) !== false) {
                      if($_SESSION["User_Branch_No"] === $Branch_No) {
                        echo "<h2> OR DELETE THIS EMPLOYEE:</h2>
                        <form class='button' action='deleteEmployeeDB.php' method='post'>
                        <input class='button' type='submit' name='submit' value='Delete Employee'> 
                        </form>";
                     }
                    } else {
                    echo "<h2> OR DELETE THIS EMPLOYEE:</h2>
                    <form class='button' action='deleteEmployeeDB.php' method='post'>
                    <input class='button' type='submit' name='submit' value='Delete Employee'> 
                    </form>";
                    }
                    ?>

                

</body>
</html>