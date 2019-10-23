<?php $url='images/wallpaper.jpg';$title='Home'; include 'init_src.php';?>
<h1>Hello  
<?php
	if (isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
		echo $_SESSION['user'];	
	}
	else{
		echo " World!";
	}
?>
</h1>
<?php
if (isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
	include 'form.html';
}
?>
<?php include 'foot_src.html';?>
