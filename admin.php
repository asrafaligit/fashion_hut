<?php

$name="";
$price=0;
$stav=0;
$pid=0;
$temp = false;
$conn3 = new mysqli("localhost", "root", "", "fashionhut");
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}
// This is for add products
if (isset($_POST['submit'])) {
  $prname = $_POST['pr-name'];
  $cat = $_POST['cat'];
  $pid = $_POST['pr-id'];
  $price = $_POST['price'];
  $stav = $_POST['stav'];
  $desc = $_POST['desc'];
  $gen = $_POST['gender'];
  if(isset($_FILES['img'])){
    $imgname = $_FILES['img']['name'];
    $imgtemp = $_FILES['img']['tmp_name'];
    $imgex = pathinfo($imgname, PATHINFO_EXTENSION);
    $imgex = strtolower($imgex);
    $allex = array("jpg","jpeg","png");
    if(in_array($imgex,$allex)){
      $newimg =uniqid("IMG-",true).'.'.$imgex;
      $imgpath = 'Uploads/'.$newimg;
      move_uploaded_file($imgtemp, $imgpath);
      
    }
    else{
      echo "unknown error";
    }
  }
  $que = "INSERT INTO `fashionhut`.`product_details`(`pr_name`,`pr_id`,`price`,`stock_avail`,`category`,`description`,`image`,`gender`)VALUES('$prname','$pid','$price','$stav','$cat','$desc','$newimg','$gen');";
  $conn3->query($que);
  $conn3->close();
}

// This is for update


  if (isset($_POST['pr-id2'])) {
    $pid = $_POST['pr-id2'];
  $sql3 = "SELECT * FROM `fashionhut`.`product_details` WHERE pr_id='$pid';";
  $result3 = $conn3->query($sql3);
  while ($row = $result3->fetch_assoc()) {
    $name = $row['pr_name'];
    $price = $row['price'];
    $stav = $row['stock_avail'];
    $temp = true;
  }
}

// ----------------------------------------------

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin page</title>
  <link rel="stylesheet" href="frontpage.css">

  <!--------- css -------->

  <style>
    .logo img {
      height: 100px;
      width: 100px;
      cursor: pointer;
    }

    #update-details {
      display: flex;
      flex-direction: row;
    }

    #leftmenu {
      width: 15%;
      height: 100vh;
      border-right: 1px solid black;
    }

    .btn2 {
      margin-left: 50px;
      margin-top: 30px;
      display: inline-block;
      background: #ff523b;
      color: #fff;
      padding: 8px 30px;
      border-radius: 30px;
    }

    #body {
      display: flex;
      flex-direction: row;
      background: radial-gradient(#fff, #ffd6d6);
      font-size: 32px;
    }

    input {
      text-align: center;
      line-height: 55px;
      color: #fcfcfc;
      transition: 0.5s;
      font-size: 1.1rem;
      height: 40px;
      margin-top: 50px;
    }

    input {
      background: #979595;
      outline: none;
      border: none;
      line-height: 1;
      font-weight: 600;
      font-size: 1.1rem;
      color: #333;
      border-radius: 20px;
    }

    input::placeholder {
      color: rgb(214, 205, 205);
      font-weight: 500;
    }

    label {
      margin-left: 50px;
    }

    #update-details {
      display: flex;
      flex-direction: row;
    }

    .mar {
      margin-left: 500px;
    }
    .desc_text{
      margin-left: 80px;
      margin-top: 20px;
    }
  </style>

  <!---------------------------->

</head>

<body>
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <img src="IMAGES/brandlogo.png" width="100px">
        </div>
        <nav>
          <ul style="margin-left: 300px;">
            <li><a href="adminhome.php">Home</a></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
        </nav>

      </div>
    </div>
  </div>
  <hr>
  <div id="body">
    <div id="leftmenu">
      <button class="btn2" onclick="showadd()">Add</button><br><br><br>
      <button class="btn2" onclick="showup()">Update</button><br><br><br>
      <button class="btn2" onclick="showdel()">Delete</button>
    </div>
    <!-- this is for add product -->
    <div>
      <form action="admin.php" method="post" enctype="multipart/form-data">
        <div id="add-details" style="display: block;">
          <label for="img">Select image:</label>
          <input type="file" id="img" name="img">
          <label for="cat">Select Category:</label>
           <select name="cat" id="category" <style background-color:#979595;></style>>
            <option value="feat_prod">Featured Products</option>
            <option value="trend_prod">Trending products</option>
            <option value="lat_prod">Latetst Products</option>
          </select><br>
          <label for="pr-name">Product name</label>
          <input type="text" name="pr-name" placeholder="Enter Product Name" />
          <label for="pr-name">Select Gender:</label>
          <select name="gender" id="gender" <style background-color:#979595;></style>>
            <option value="male">Male </option>
            <option value="female">Female</option>
          </select><br>
          <label for="p-id">Product Id</label>
          <input type="text" name="pr-id" placeholder="Enter Product Id" /><br>
          <label for="price">price</label>
          <input type="text" name="price" placeholder="Enter Price" /><br>
          <label for="stav">Stock Available</label>
          <input type="text" name="stav" placeholder="Enter Stock availability" />
          <input class=btn type="submit" name="submit" style="margin-left: 100px;"><br>
          <textarea class="desc_text" name="desc" cols="30" rows="3" placeholder="Add Description of the product"></textarea><br>
        </div>
      </form>
      <!-- <label for="img">Select image:</label>
      <form action="admin.php" method="post" enctype="multipart/form-data">
      <input type="file" id="img" name="img">
    <input type="submit" name="sbimg" value="upload"></form> -->
      <!-- this is for update product -->
      
      <div id="update-details" style="display: none;">
        <div><form action="admin.php" method="post">
          <h1 align="center" style="font-size: 50px;">UPDATE PRODUCT DETAIL</h1>
          <label for="p-id">Product Id</label>
          <input type="text" name="pr-id2" placeholder="Enter Product Id To Update" />
          <button class="btn2">Fetch Details</button><br>
        </form>
        </div>
        <div>
          <label class="mar" for="cat">Select Category"</label>
          <select name="cat" id="category" style="background-color:#979595;">
            <option value="feat_prod">Featured Products</option>
            <option value="trend_prod">Trending products</option>
            <option value="lat_prod">Latetst Products</option>
          </select>
          <form action="update_details.php" method="post">
          <label class="mar" for="pr-name">Product name</label>
          <input type="hidden" name="upid" value="<?php echo $pid; ?>"/>
          <input type="text" name="pr-name" placeholder="Enter Product Name" value="<?php echo $name; ?>"></input><br>
          <label class="mar" for="price">price</label>
          <input type="text" name="price" placeholder="Enter Price" value="<?php echo $price; ?>"></input><br>
          <label class="mar" for="stav">Stock Available</label>
          <input type="text" name="stav" placeholder="Enter Stock availability"value="<?php echo $stav;  ?>"/><br><?php
              if($temp == true){
                echo "<script>
                      var div=document.getElementById('add-details');
                      div.style.display='none';
                      var div = document.getElementById('update-details');
                      div.style.display='block';    
                  </script>";
                  $temp = false;
              }
              ?>
          <button class="btn2" style="background-color: blueviolet; margin-left: 550px; margin-top: 100px;">Update</button><br>
          </form>
        </div>
      </div>
      <!-- this is for deltetion of the product -->
      <form action="update_details.php" method="post">
      <div id="delete" style="display: none;">
        <label for="p-id"> Enter Product Id To Delete</label>
        <input type="text" name="pr-id" placeholder="Enter Product Id To Delete" />
        <button>Delete</button><br>
      </div>
      </form>
    </div>

  </div>

  <!----------  java script  ---------->
  <script>
    function showadd() {
      var div = document.getElementById('add-details');
      var div2 = document.getElementById('update-details');
      var div3 = document.getElementById('delete');
      div.style.display = "block";
      div2.style.display = "none";
      div3.style.display = "none";
    }

    function showup() {
      var div = document.getElementById('add-details');
      var div2 = document.getElementById('update-details');
      var div3 = document.getElementById('delete');
      div.style.display = "none";
      div2.style.display = "block";
      div3.style.display = "none";
    }

    function showdel() {
      var div = document.getElementById('add-details');
      var div2 = document.getElementById('update-details');
      var div3 = document.getElementById('delete');
      div.style.display = "none";
      div2.style.display = "none";
      div3.style.display = "block";
    }
  </script>
  <!-------------------------------->
  </body>
</html>