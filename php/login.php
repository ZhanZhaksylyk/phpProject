<?php
if(!isset($_SESSION)){session_start();}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$connError=mysqli_connect_error();
if (!is_null($connError)) {
    die("Connection failed: " . $connError);
}

$email=mysqli_real_escape_string($conn,$_POST["email"]);
$passwordOf=mysqli_real_escape_string($conn,$_POST["password"]);

$sql = "SELECT * FROM accounts where Email like '$email' and Password like '$passwordOf'";
$result=mysqli_query($conn,$sql);
$_SESSION['user']=mysqli_fetch_assoc($result)['name'];
?>
<meta http-equiv="refresh" content="0;URL=../index.php" />
