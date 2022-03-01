<?php



// Create connection
$con=mysqli_connect("localhost","root","12345678","project");

// Check connection
if (mysqli_connect_errno($con)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$nextSupplierID = 0;

while($row = mysqli_fetch_array($result))
{
   $nextSupplierID = $row['Email'];
}

$rowSQL = mysqli_query($con ,"SELECT MAX(Supplier_No) as max FROM project.supplier" );
$row = mysqli_fetch_array( $rowSQL );
$nextSupplierID = $row['max'];
$nextSupplierID++;
 
function buttonClicked($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Supplier_No = $_POST["Supplier_No"];
$Location = $_POST["Location"];
$Distributer_Name = $_POST["Distributer_Name"];
$Phone_Number = $_POST["Phone_Number"];
$Branch_No = $_POST["Branch_Number"];

echo $_POST['dName'];
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


        <a href="supplier.php" class ="button"> Back to Supplier Page </a>
  </div>
  
    <!-- HEADER CLASS -->
    <div class="form-container">
        <label class="form-center">Supplier Information: </label>
        <br>
        <form action="addSupplierDB.php" method="post">
            <br>
            <div class="form-center2">
            </div>
            <div class="form-center2">
              Supplier ID:<br> <label class="form-center"> <?php echo $nextSupplierID;?> </label>

              Distributer Name:<br> <input type="text" name="dName" >
              <br>
            </div>
            
            <div class ="form-center2">
                Location:<br> <input type="text" name="location">
                <br>
                Phone Number:<br> <input type="text" name="pNum">
                <br>
                Branch Number:<br> <input type="int" name="bNum">
            </div>

            <input class="button" type="submit" name="submit" value="Add!">
        </form>
        <br>
    </div>
    
</body>
</html>