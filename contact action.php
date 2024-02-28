<!-- Inserting Data Into Database Code -->

<?php
include 'db contact.php';

$username=$_POST['username'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$message=$_POST['message'];

$sql="INSERT INTO `fashionhut`.`contact`(`Username`,`Email`,`Contact`,`Message`) VALUES ('$username','$email','$contact','$message');";

$result=mysqli_query($conn, $sql);

if($result){
    echo '<script>alert("submitted successfully")</script>';
}

?>