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
        table{
            text-align: center;
            border: 2px solid black;
            margin: auto;
        }
        td{
            padding-bottom: 40px;
        }
        th{
            padding-right: 20px;
        }
        body{
    background: radial-gradient(#fff,#ffd6d6);
    
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
                   <li><a href="adminhome.php">Home</a></li>
                   <li><a href="index.php">Logout</a></li>
               </ul>
            </nav>
        </div></div></div>
        <table>
            <thead>
                <tr>
                <th>Username</th>
                <th>order No</th>
                <th>Product Id</th>
                <th>Transaction Id</th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    $que = "SELECT * FROM `fashionhut`.`payment_details` ORDER BY payment_date desc;";
                    $res = $conn3->query($que);
                    while($row=$res->fetch_assoc()){

                    
                ?>
                <tr>
                    <td><?php echo $row['uname']; ?></td>
                    <td><?php echo $row['order_no']; ?></td>
                    <td><?php echo $row['pr_id']; ?></td>
                    <td><?php echo $row['trans_no']; ?></td>
                    <td>
                    <form action="details.php" method="post">
                        <input type="hidden" name="cust" value="<?php echo $row['order_no']; ?>"><button class="btn" style="width: 120px; margin-right: 20px;">Customer Details</button></td>
                        </form>
                    <?php 
                        if($row['status']==0){
                            $stat = "dispatch";
                        }
                        elseif($row['status']==1){
                            $stat = "deliver";
                        }
                    ?>
                    <form action="details.php" method="post">
                    <td><input type="hidden" name="stat" value="<?php echo $row['order_no']; ?>"><button class="btn"><?php echo $stat; ?></button></td>
                    </form>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
</body>
</html>