<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WOMEN SECTION</title>
    <link rel="stylesheet" href="men.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>
<body>  


<div class="header">
      <div class="container">
        <div class="navbar">
        <div class="logo">
          <img src="IMAGES/brandlogo.png" width="100px">
     </div>
           <nav>
                 <ul>
                   <li><a href="frontpage.php">Home</a></li>
                   <li><a href="men.php">Men</a></li>
                   <li><a href="#">Women</a></li>
                   <li><a href="about.php">About</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li><a href="index.php">Account</a></li>
               </ul>
            </nav>
        </div>

        <!-----featured  categories----->
        <div class="categories">
            <div class="small-container">
            <h2 class="title">Trending Products</h2>
            <div class="row">

            <?php
           $conn3 = new mysqli("localhost", "root", "", "fashionhut");
           // Check connection
           if ($conn3->connect_error) {
             die("Connection failed: " . $conn3->connect_error);
           }
          $que = "SELECT * FROM `fashionhut`.`product_details` WHERE ((gender='female')&&(category='trend_prod'));";
          $res=$conn3->query($que);
          while($row=$res->fetch_assoc()){
            $img = $row['image'];
            $name = $row['pr_name'];
            $price = $row['price'];
            $id = $row['pr_id'];
            $imgpath = "Uploads/".$img;
        ?>
        <div class="col-3">
                <img src="<?php echo $imgpath;  ?>">
                <h4><?php echo $name;  ?></h4> 
            <p> Rs <?php echo $price; ?></p>
            <form action="description.php" method="post">
              <input type="hidden" value ='<?php echo $id; ?>' name="prid"> 
            <button class="btn">BUY &#8594;</button> </form> 
                 </div>

              <?php 

          }
          ?>
               
</div>
           

</div>
</div>


        <!----------featured  products------------>
                  <div class="small-container">
              <h2 class="title">Featured Products</h2>
              <div class="row">

              <?php
          
          $que = "SELECT * FROM `fashionhut`.`product_details` WHERE ((gender='female')&&(category='feat_prod'));";
          $res=$conn3->query($que);
          while($row=$res->fetch_assoc()){
            $img = $row['image'];
            $name = $row['pr_name'];
            $id = $row['pr_id'];
            $price = $row['price'];
            $imgpath = "Uploads/".$img;
        ?>
        <div class="col-4">
                <img src="<?php echo $imgpath;  ?>">
                <h4><?php echo $name;  ?></h4> 
            <p> Rs <?php echo $price; ?></p>
            <form action="description.php" method="post">
              <input type="hidden" value ='<?php echo $id; ?>' name="prid"> 
            <button class="btn">BUY &#8594;</button> </form>
                 </div>

              <?php 

          }
          ?>
             
            
    </div>

    <h2 class="title">Latest Products</h2>
    <div class="row">
    <?php
          
          $que = "SELECT * FROM `fashionhut`.`product_details` WHERE ((gender='female')&&(category='lat_prod'));";
          $res=$conn3->query($que);
          while($row=$res->fetch_assoc()){
            $img = $row['image'];
            $name = $row['pr_name'];
            $price = $row['price'];
            $id= $row['pr_id'];
            $imgpath = "Uploads/".$img;
        ?>
        <div class="col-4">
                <img src="<?php echo $imgpath;  ?>">
                <h4><?php echo $name;  ?></h4> 
            <p> Rs <?php echo $price; ?></p>
            <form action="description.php" method="post">
              <input type="hidden" value ='<?php echo $id; ?>' name="prid"> 
            <button class="btn">BUY &#8594;</button> </form>
                 </div>

              <?php 

          }
          ?>
             
    </div>
    </div>
           
</body>
</html>