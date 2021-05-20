<?php
include './database.php';

$data=$_POST['data'];
var_dump($data);

$name=$data["name"];
$city=$data["city"];
$age=$data["age"];
$education=$data["education"];
$description=$data["description"];
$phone=$data["phone"];
$gender=$data["gender"];
$status=$data["status"];
$position=$data["position"];

$id=$_SESSION['user_id'];

$sql = "UPDATE accounts SET name='$name',city='$city',age='$age',education='$education',description='$description',phone='$phone',gender='$gender',status='$status',position='$position' where id='$id'";
$result=mysqli_query($conn,$sql);
var_dump($result);
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />