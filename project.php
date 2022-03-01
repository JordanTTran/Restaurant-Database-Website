<?php
session_start();

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
              <a href="#">perfectstudents.database</a>
          </header>
        <h1>Role: <?php echo $_SESSION['user_role']; ?><h1>
        <h1><span>Welcome to your</span> restaurant database</h1>
        </section>
    </div>
    
    <section class="reg-bg">

        <div class="right-col" >
            <br>
            <h1>What would you like to view?</h1>
            <a href="supplier.php" class ="button" > Suppliers </a>
            <a href="employee.php" class ="button"> Employees </a>
            <a href="orders.php" class ="button"> Orders </a>
            <a href="customer.php" class ="button"> Customers </a>
            <a href="branch.php" class ="button"> Branches </a>
            <h2> Or you can choose to log out</h2>
            <a href="signIn.php" class ="button"> Sign Out </a>
        </div>

    </section>
  
  
    <script src='scripts.js'></script>
</body>
</html>