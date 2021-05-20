<?php
include './database.php';

$email=mysqli_real_escape_string($conn,$_POST["email"]);
$passwordOf=mysqli_real_escape_string($conn,$_POST["password"]);

$sql = "SELECT name,id FROM accounts where Email like '$email' and Password like '$passwordOf'";
$result=mysqli_query($conn,$sql);
$results=mysqli_fetch_assoc($result);
$_SESSION['user']=$results['name'];
$_SESSION['user_id']=$results['id'];
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
