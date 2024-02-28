<?php
$name="";
$price=0;
$stav=0;
$pid=0;
$conn3 = new mysqli("localhost", "root", "", "fashionhut");
// Check connection
if ($conn3->connect_error) {
  die("Connection failed: " . $conn3->connect_error);
}

    if(isset($_POST['pr-name']))
    {$name=$_POST['pr-name'];
    $pid = $_POST['upid'];
    $price = $_POST['price'];
    $stav = $_POST['stav'];
    $que = "UPDATE `fashionhut`.`product_details` SET pr_name='$name' WHERE pr_id='$pid';";
    if($conn3->query($que)){
        //do nothing
    }
    $que = "UPDATE `fashionhut`.`product_details` SET price='$price' WHERE pr_id='$pid';";
    $conn3->query($que);
    $que = "UPDATE  `fashionhut`.`product_details` SET stock_avail='$stav' WHERE pr_id='$pid';";
    $conn3->query($que);
    echo "<script>alert('updated successfully');</script>";
}

if(isset($_POST['pr-id'])){
    $pid = $_POST['pr-id'];
    $que = "DELETE FROM `fashionhut`.`product_details` WHERE pr_id='$pid';";
    $conn3->query($que);
    echo "<script>alert('deleted succesfully');</script>";
}

?>
    