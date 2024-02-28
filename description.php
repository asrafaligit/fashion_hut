<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fahion Hut | Ecommerce Website Design</title>
    <link rel="stylesheet" href="frontpage.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>
<style>
    .desc{
        text-align: center;
    }
    img{
        height: 400px;
    }
    body{
    background: radial-gradient(#fff,#ffd6d6);
    background-repeat: no-repeat;
    
    }
</style>
<body>  
<div class="header">
      <div class="container">
        <div class="navbar">
        <div class="logo">
          <img src="IMAGES/brandlogo.png" width="100px">
     </div>
           <nav>
                 <ul>
                   <li><a href="#">Home</a></li>
                   <li><a href="men.php">Men</a></li>
                   <li><a href="women.php">Women</a></li>
                   <li><a href="about.php">About</a></li>
                   <li><a href="Contact Us.php">Contact</a></li>
                   <li><a href="index.php">Account</a></li>
               </ul>
            </nav>
        </div></div></div>
        <div class="desc">
            <?php  
                $conn3 = new mysqli("localhost", "root", "", "fashionhut");
                // Check connection
                if ($conn3->connect_error) {
                  die("Connection failed: " . $conn3->connect_error);
                }
                $id = $_POST['prid'];
                $que = "SELECT * FROM `fashionhut`.`product_details` WHERE pr_id='$id';";
                $res=$conn3->query($que);
                $row = $res->fetch_assoc();
                $img = $row['image'];
                $name = $row['pr_name'];
                $desc = $row['description'];
                $price = $row['price'];
                $stock = $row['stock_avail'];
                $img = "Uploads/" . $img;
            ?>
            <img src="<?php echo $img ?>" alt="image">
        </div><div style="margin-top: 20px; text-align: center;">
            <p><b><?php echo $name; ?></b></p>
            <p><b>Rs <?php echo $price; ?></b></p>
            <p><?php echo $desc; ?></p>
            <form action="ordersummary.php" method="post">
              <input type="hidden" value ='<?php echo $id ?>' name="prid"> 
              <?php
                if($stock==0){
                    echo "<p style='color:red;'>out of stock</p>";
                }
                else{
                    echo "<button class='btn'>BUY &#8594;</button> </form>";
                }
              ?>
        </div>
</body>
</html>