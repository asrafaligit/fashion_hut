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
    <title>view orders</title>
    <link rel="stylesheet" href="men.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300,400;500,600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <style>
        body{
    background: radial-gradient(#fff,#ffd6d6);
    
    }
    table{
        margin: auto;
    }
    td, th{
        padding: 10px;
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
           <nav style="margin-left: 300px;">
                 <ul>
                   <li><a href="adminhome.php">Home</a></li>
                   <li><a href="index.php">Logout</a></li>
               </ul>
            </nav>
        </div></div></div>
    <table>
        <thead>
            <th><i>Username</i></th>
            <th><i>Product Id</i></th>
            <th><i>Order No</i></th>
            <th><i>Transaction Id</i></th>
        </thead>
        <tbody>
            <?php
                $que = "SELECT * FROM `fashionhut`.`success_order`;";
                $res = $conn3->query($que);
                while($row=$res->fetch_assoc()){
                    $uname = $row['uname'];
                    $prid = $row['pr_id'];
                    $ono = $row['order_no'];
                    $tr = $row['trans_id'];
            ?>
            <tr>
                <td><?php echo $uname; ?></td>
                <td><?php echo $prid; ?></td>
                <td><?php echo $ono; ?></td>
                <td><?php echo $tr; ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>