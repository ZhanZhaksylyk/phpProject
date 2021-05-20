<?php $url='/phpProject/assets/images/wallpaper.jpg';$title='Sign UP'; include '../init_src.php';?>
<hr>
<hr>
<form method="post" action="../functions/signup.php">
	<input type="text" name="name" placeholder="Name">
	<input type="text" name="email" placeholder="email">
	<br>
	<input type="password" name="password" placeholder="password">

	<input type="text" name="city" placeholder="city">
	<input type="text" name="age" placeholder="age">
	<input type="text" name="education" placeholder="education">
	<textarea name="description" placeholder="description">
	</textarea>
	<input name="phone" placeholder="phone"/>
	<select name="status">
		<option value='1'>Married</option>
		<option value='2'>Single</option>
	</select>
	<select name="gender">
		<option value='1'>Male</option>
		<option value='2'>Female</option>
	</select>
	<input name="position" placeholder="position"/>
	<hr>
	<hr>
	<input type="submit" name="button">
</form>
<?php include '../common/footer.php';?>