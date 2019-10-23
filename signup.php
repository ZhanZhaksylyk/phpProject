<?php $url='images/wallpaper.jpg';$title='Sign UP'; include 'init_src.php';?>
<hr>
<hr>
<form method="post" action="php/signup.php">
	<input type="text" name="name" placeholder="Name">
	<input type="text" name="email" placeholder="email">
	<br>
	<input type="password" name="password" placeholder="password">
	<hr>
	<hr>
	<input type="submit" name="button">
</form>
<?php include 'foot_src.html';?>