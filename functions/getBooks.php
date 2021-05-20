<?php
include './database.php';

$user_id=$_SESSION['user_id'];

$sql = "SELECT * FROM books where user_id like '$user_id'";
$result=mysqli_query($conn,$sql);
$results=mysqli_fetch_assoc($result);

echo($results);
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
