<?php
$conn3 = new mysqli("localhost", "root", "", "fashionhut");
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}
session_start();
$uname = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="men.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
   <style>
   body{
    background: radial-gradient(#fff,#ffd6d6);
    
    }
    table{
        margin-left: 100px;
    }
    td{
        padding-left: 70px;
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
                 <ul>
                   <li><a href="frontpage.php">Home</a></li>
                   <li><a href="men.php">Men</a></li>
                   <li><a href="women.php">Women</a></li>
                   <li><a href="about.php">About</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li><a href="index.php">Account</a></li>
               </ul>
            </nav>
<img src="IMAGES/cart.jpg" width="30px" height="30px">
        </div></div></div>
        <table>
            <tbody>
            <?php
                $que = "SELECT * FROM `fashionhut`.`customer_details` WHERE ((uname='$uname')&&(status=1));";
                $res = $conn3->query($que);
                while($row = $res->fetch_assoc()){
                    $prid=$row['pr_id'];
                    $o_no=$row['order_no'];
                    $que2 = "SELECT * FROM `fashionhut`.`product_details` WHERE pr_id = $prid;";
                    $res2 = $conn3->query($que2);
                    $row2 = $res2->fetch_assoc();
                    $img = $row2['image'];
                    $pname = $row2['pr_name'];
                    $price = $row2['price'];
                    $img = "Uploads/" . $img
                ?>
                 <tr>
                <td><img style="height: 150px; width: 150px;" src="<?php echo $img; ?>" alt=""></td>
                <td>Name:<?php echo $pname; ?><br>
                Price:<?php echo $price; ?><br>
                Order No:<?php echo $o_no; ?><br>
                Status:Delivered</td>
            </tr>
                <?php
                }
                
                $que = "SELECT * FROM `fashionhut`.`payment_details` WHERE uname='$uname';";
                $res = $conn3->query($que);
                while($row=$res->fetch_assoc()){
                    $prid = $row['pr_id'];
                    $o_no = $row['order_no'];
                    $tr = $row['trans_no'];
                    $stat = $row['status'];
                    if($stat == 0){
                        $stat = "Order Placed";
                    }
                    
                    elseif($stat==1){
                        $que3 = "SELECT * FROM `fashionhut`.`success_order` WHERE trans_id = $tr;";
                        $res3 = $conn3->query($que3);
                        $row3 = $res3->fetch_assoc();
                        if(mysqli_num_rows($res3)>0){
                            $stat="Delivered";
                        }
                        else{
                        $stat="Order Dispatched";
                        }
                    }
                    $que2 = "SELECT * FROM `fashionhut`.`product_details` WHERE pr_id = $prid;";
                    $res2 = $conn3->query($que2);
                    $row2 = $res2->fetch_assoc();
                    $img = $row2['image'];
                    $pname = $row2['pr_name'];
                    $price = $row2['price'];
                    $img = "Uploads/" . $img;
            ?>
            <tr>
                <td><img style="height: 150px; width: 150px;" src="<?php echo $img; ?>" alt=""></td>
                <td>Name:<?php echo $pname; ?><br>
                Price:<?php echo $price; ?><br>
                Order No:<?php echo $o_no; ?><br>
                Transaction Id:<?php echo $tr; ?><br>
                Status:<?php echo $stat; ?></td>
            </tr>
            <?php
                }
                ?>
                <hr>
            </tbody>
        </table>
</body>
</html>