<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="paymentstyle.css">
    <link rel="stylesheet" href="frontpage.css">
    <style>
        body{
            background: radial-gradient(#fff,#ffd6d6);
            display: block;
        }
        input{
    width: 70%;
    border:none;
    outline: none;
    padding: 10px;
    border: 1px solid #999;
    margin-bottom: 15px;
}
    </style>
</head>
<body>
    <div style="margin-left: 100px;">
        <?php
            $conn3 = new mysqli("localhost", "root", "", "fashionhut");
            // Check connection
            if ($conn3->connect_error) {
              die("Connection failed: " . $conn3->connect_error);
            }
            $id = $_POST['prid'];
            $que = "SELECT * FROM `fashionhut`.`product_details` WHERE pr_id='$id';";
            $res = $conn3->query($que);
            $row = $res->fetch_assoc();
            $name = $row['pr_name'];
            $price = $row['price'];
        ?>
        <p style="margin-left: 400px; margin-top: 30px;">Product name: <?php echo $name ?></p>
        <p style="margin-left: 400px; margin-top: 20px;">Rs. <?php echo $price ?></p>
    </div>
    <hr style="border: 2px solid black; margin-top: 20px;">
    <p style="margin-left: 600px; margin-top: 10px;" ><b>Fill Address To Place Order</b></p>
    <div class="container" style="margin-top: 15px;">
        <form action="payment.php" method="post">
        <label for="name">Name:</label>
        <input type="text" placeholder="Enter your name" name="name" required>
        <label for="phno">Phone No:</label>
        <input type="number" placeholder="Enter your phone number" name="phno" required>
        Address<br>
        <input type="text" placeholder="Adrres Line 1" name="addr1"><br>
        <input type="text" placeholder="Adrres Line 2" name="addr2"><br>
    </div>
              <input type="hidden" value ='<?php echo $id ?>' name="prid"> 
            <button style="margin-left: 700px;" class="btn">BUY &#8594;</button> </form>
</body>
</html>