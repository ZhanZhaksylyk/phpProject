<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$connError=mysqli_connect_error();
if (!is_null($connError)) {
    die("Connection failed: " . $connError);
}

$name=$_POST["name"];
$email=$_POST["email"];
$passwordOf=$_POST["password"];

$sql = "INSERT INTO accounts(Name,Email,Password) VALUES ('$name','$email','$passwordOf')";
$result=mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
