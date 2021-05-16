<?php
include './database.php';

$email=mysqli_real_escape_string($conn,$_POST["email"]);
$passwordOf=mysqli_real_escape_string($conn,$_POST["password"]);

$sql = "SELECT * FROM accounts where Email like '$email' and Password like '$passwordOf'";
$result=mysqli_query($conn,$sql);
$_SESSION['user']=mysqli_fetch_assoc($result)['name'];
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
