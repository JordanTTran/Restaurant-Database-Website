<?php
session_start();


// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nextEmployeeID = 0;

$rowSQL = mysqli_query($con ,"SELECT MAX(Employee_ID) as max FROM project.employee" );
$row = mysqli_fetch_array( $rowSQL );
$nextEmployeeID = $row['max'];
$nextEmployeeID++;


function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Name = $_POST["Supplier_No"];
$SIN = $_POST["SIN"];
$Wage = $_POST["Wage"];
$Role = $_POST["Role"];
$Liquor_License_Number = $_POST["Liquor_License_Number"];
$_SESSION["next"] = $nextEmployeeID;


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
        <form action="addEmployeeDB.php" method ="post">
            <br>
            <div class="form-left">
              Employee ID:<br> <label class="form-center"><?php echo $nextEmployeeID ?> </label>
              <br>
              Name:<br> <input type="text" name="employeeName">
              <br>
              SIN:<br> <input type="text" name="SIN">
              <br>
            </div>
            
            <div class="form-left">
                <br>  
                <br>    
                <br>
                Wage:<br> <input type="text" name="wage">
                <br>
                <br>
                <!--  Role:<br> <input type="text" name="role">-->
                <select name ="role">
                <option value ="Bartender">Bartender </option> 
                <option value ="Cook">Cook </option> 
                <option value ="Host">Host </option> 
                <option value ="Manager">Manager </option> 
                <option value ="Server">Server </option> 
                </select>

                <br>
            </div>
            <div class="form-left">
              <br>  
              <br>    
              <br>
              Liquor License Number:<br> <input type="int" name="liquorLicenseNum">
              <br>
                Branch Number:<br> <input type="int" name="bNum">
          </div>
          <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
    </div>
    
</body>
</html>