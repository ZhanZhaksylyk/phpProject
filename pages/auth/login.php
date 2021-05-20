<?php $url='/phpProject/assets/images/wallpaper.jpg';$title='Login'; include '../../init_src.php';?>
<hr>
<hr>

<form method="post" action="/phpProject/functions/login.php">
	<input type="text" name="email" placeholder="email">
	<input type="password" name="password" placeholder="password">
	<hr>
	<hr>
	<input type="submit" name="button">
</form>
<?php include '../..//common/footer.php';?> 