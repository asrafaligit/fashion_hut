<?php
$conn3 = new mysqli("localhost", "root", "", "fashionhut");
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="men.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <style>
        body{
    background: radial-gradient(#fff,#ffd6d6);
    
    }
    .center{
        margin: auto;
    }
    </style>
</head>
<body>
<div class="header">
      <div class="container">
        <div class="navbar">
        <div class="logo">
          <img src="IMAGES/brandlogo.png" width="100px">
     </div>
           <nav>
                 <ul style="margin-left: 100px;">
                   <li><a href="adminhome.php">Home</a></li>
                   <li><a href="index.php">Logout</a></li>
               </ul>
            </nav>
        </div></div></div>
<div style="margin-top: 50px;" class="center">
    <a style="height: 150px; width: 150px; padding-top: 50px; margin-left: 500px; padding-left: 20px;" href="admin.php" class="btn">Manage products </a>
    <a style="height: 150px; width: 150px; padding-top: 50px; padding-left: 20px;" href="view_orders.php" class="btn">View Orders</a>
    <a style="height: 150px; width: 150px; padding-top: 50px; padding-left: 20px;" href="successful_orders.php" class="btn">Successful orders</a>
</div>

</body>
</html>