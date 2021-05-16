<?php
include './database.php';
$name=$_POST["name"];
$email=$_POST["email"];
$passwordOf=$_POST["password"];
$city=$_POST["city"];
$age=$_POST["age"];
$education=$_POST["education"];
$description=$_POST["description"];
$phone=$_POST["phone"];
$gender=$_POST["gender"];
$status=$_POST["status"];
$position=$_POST["position"];

$sql = "INSERT INTO accounts(name,email,password,city,age,education,description,phone,gender,status,position) VALUES ('$name','$email','$passwordOf','$city','$age','$education','$description','$phone','$gender','$status','$position')";
$result=mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
