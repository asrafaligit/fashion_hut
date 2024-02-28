<?php
$conn3 = new mysqli("localhost", "root", "", "fashionhut");
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}
if(isset($_POST['cust'])){
$id = $_POST['cust'];
}
if(isset($_POST['stat'])){
    $o_no = $_POST['stat'];
    $que = "SELECT status FROM `fashionhut`.`payment_details` WHERE order_no=$o_no;";
    $res= $conn3->query($que);
    $row = $res->fetch_assoc();
    $st = $row['status'];
    if($st==1){
        $que = "SELECT * FROM `fashionhut`.`payment_details` WHERE order_no=$o_no;";
        $res=$conn3->query($que);
        $row = $res->fetch_assoc();
        $uname = $row['uname'];
        $prid = $row['pr_id'];
        $tr = $row['trans_no'];
        echo $uname;
        echo $prid;
        echo $tr;
        $que = "INSERT INTO `fashionhut`.`success_order`(`uname`,`pr_id`,`order_no`,`trans_id`)VALUES('$uname','$prid','$o_no','$tr');";
        $conn3->query($que);
        $que = "DELETE FROM `fashionhut`.`payment_details` WHERE order_no=$o_no;";
        $conn3->query($que);
        $que = "UPDATE `fashionhut`.`customer_details` SET status=1 WHERE order_no=$o_no;";
        $conn3->query($que);
        header("Location: view_orders.php");
    }
    else{
    $st = $st+1;
    $que = "UPDATE `fashionhut`.`payment_details` SET status=$st WHERE order_no=$o_no;";
    $conn3->query($que);
    header("Location: view_orders.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="men.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <style>
        body{
    background: radial-gradient(#fff,#ffd6d6);
    
    }
    table{
        margin: auto;
        border: 2px solid black;
    }
    td{
        padding: 20px;
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
            <thead>
                <th>Username</th>
                <th>Name</th>
                <th>Phone number</th>
                <th>Address</th>
                <th>product Id</th>
            </thead>
            <tbody>
                <?php
                    $que = "SELECT * FROM `fashionhut`.`customer_details` WHERE order_no=$id;";
                    $res = $conn3->query($que);
                    $row=$res->fetch_assoc();
                ?>

                <tr>
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['ph_no']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['pr_id']; ?></tr>
            </tbody>
        </table>
</body>
</html>