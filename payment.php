<?php
$conn3 = new mysqli("localhost", "root", "", "fashionhut");
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}
session_start();
$uname = $_SESSION['uname'];
$temp = true;
if(isset($_POST['submit'])){
    $id = $_POST['prid'];
    $cname = $_POST['c_name'];
    $cno =$_POST['cno'];
    $cvv = $_POST['cvv'];
    $month = $_POST['months'];
    $year = $_POST['years'];
    $o_no=$_SESSION['o_no'];
    $que = "SELECT stock_avail FROM `fashionhut`.`product_details` WHERE pr_id='$id';";
    $res = $conn3->query($que);
    $row = $res->fetch_assoc();
    $stock = $row['stock_avail'];
    $t_no=rand(10000000,99999999);
    $stock=$stock-1;
    $date = $month ."/" . $year;
    $que = "INSERT INTO `fashionhut`.`payment_details`(`uname`,`pr_id`,`card_name`,`card_no`,`cvv`,`ex_date`,`payment_date`,`order_no`,`trans_no`,`status`)VALUES('$uname','$id','$cname','$cno','$cvv','$date',now(),'$o_no','$t_no','0');";
    $conn3->query($que);
    $temp=false;
    $que = "UPDATE `fashionhut`.`product_details` SET stock_avail='$stock';";
    $conn3->query($que);
    header("Location: confirm.php");
}
$id = $_POST['prid'];
$name = $_POST['name'];
$phno = $_POST['phno'];
$ad1 = $_POST['addr1'];
$ad2 = $_POST['addr2'];
$address = $ad1 . $ad2;
$o_no = rand(10000,99999);
$_SESSION['o_no']=$o_no;
if($temp==true);
$que = "INSERT INTO `fashionhut`.`customer_details`(`uname`,`name`,`ph_no`,`address`,`pr_id`,`order_no`)VALUES('$uname','$name','$phno',\"$address\",'$id','$o_no');";
$conn3->query($que);
$que = "DELETE FROM `fashionhut`.`customer_details` WHERE ph_no=0;";
$conn3->query($que);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="paymentstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    body{
    background: radial-gradient(#fff,#ffd6d6);
    
    }
</style>
<body>
    <div class="container" style="background: radial-gradient(#fff,#ffd6d6);">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <form action="payment.php" method="post">
                <h3>Card Holder Name</h3>
                <div class="input-field">
                    <input type="text" name="c_name" require>
                </div>
                <div>
                    <?php
                        
            $que = "SELECT price FROM `fashionhut`.`product_details` WHERE pr_id='$id';";
            $res = $conn3->query($que);
            $row = $res->fetch_assoc();
            $price = $row['price'];
                    ?>
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="password" maxlength="3" name="cvv">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" maxlength="16" name="cno">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Expiry Date</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                    <select name="years" id="years">
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                <div class="cards">
                    <img src="source_payment_form/mc.png" alt="">
                    <img src="source_payment_form/vi.png" alt="">
                    <img src="source_payment_form/pp.png" alt="">
                </div>
            </div>
        </div>
        <input type="hidden" name="prid" value="<?php echo $id; ?>">
        <button name='submit'>Pay Now Rs. <?php echo $price; ?></button></form>
    </div>
</body>

</html>