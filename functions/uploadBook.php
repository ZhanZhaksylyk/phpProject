<?php
include './database.php';

$data=$_POST['data'];
$title=$data["title"];
$author=$data["author"];
$description=$data["description"];
$image=$data["image"];
$user_id=$_SESSION['user_id'];

$sql = "INSERT INTO books(title,author,description,image,user_id) VALUES ('$title','$author','$description','$image','$user_id')";
$result=mysqli_query($conn,$sql);

?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
