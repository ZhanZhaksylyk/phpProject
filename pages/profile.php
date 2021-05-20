<?php $url = '/phpProject/assets/images/wallpaper.jpg';
$title = 'Home';
include '../init_src.php';
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM accounts where id like '$user_id'";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
}
else{
	header('Location: ./music.php');
}
?>

<form onsubmit="edit(event)">
	<div class="d-flex mt-4">
		<div class="input_box">
			<label>Name: </label>
			<input type="text" name="name" value="<?php echo $user['name'] ?>" class="ml-3" />
		</div>
		<div class="input_box">
			<label>Status: </label>
			<select name="status" value="2" class="ml-3">
				<option value='1' <?php echo $user['status'] == 1 ? 'selected' : '' ?>>Married</option>
				<option value='2' <?php echo $user['status'] == 2 ? 'selected' : '' ?>>Single</option>
			</select>
		</div>
		<div class="input_box">
			<label>Age: </label>
			<input type="text" name="age" value="<?php echo $user['age'] ?>" class="ml-3" />
		</div>
		<div class="input_box">
			<label>Gender: </label>
			<select name="gender" value="<?php echo $user['gender'] ?>" class="ml-3">
				<option value='1' <?php echo $user['gender'] == 1 ? 'selected' : '' ?>>Male</option>
				<option value='2' <?php echo $user['gender'] == 2 ? 'selected' : '' ?>>Female</option>
			</select>
		</div>
	</div>
	<div class="d-flex mt-4">
		<div class="input_box">
			<label>Position: </label>
			<input type="text" name="position" value="<?php echo $user['position'] ?>" class="ml-3" />
		</div>
		<div class="input_box">
			<label>Education: </label>
			<input type="text" name="education" value="<?php echo $user['education'] ?>" class="ml-3" />
		</div>
	</div>
	<div class="d-flex mt-4">
		<div class="input_box">
			<label>Phone: </label>
			<input type="text" name="phone" value="<?php echo $user['phone'] ?>" class="ml-3" />
		</div>
	</div>
	<div class="d-flex mt-4">
		<div class="input_box">
			<label>City: </label>
			<input type="text" name="city" value="<?php echo $user['city'] ?>" class="ml-3" />
		</div>
	</div>
	<div class="d-flex mt-4">
		<div class="input_box">
			<label>Description: </label>
			<textarea type="text" name="description" class="ml-3"><?php echo $user['description'] ?></textarea>
		</div>
		<div class="d-flex p-3">
			<button class="btn btn-primary" type="submit">Edit</button>
		</div>
	</div>
</form>
<?php include '../common/footer.php'; ?>

<script>
	function edit(event) {
		event.preventDefault();
		let inputs = event.target.elements;
		let data = {
			name: inputs.name.value,
			status: inputs.status.value,
			age: inputs.age.value,
			gender: inputs.gender.value,
			position: inputs.position.value,
			education: inputs.education.value,
			phone: inputs.phone.value,
			city: inputs.city.value,
			description: inputs.description.value,
		};
		$.ajax({
			type: "POST",
			url: '/phpProject/functions/editProfile.php',
			data: {
				data
			},
			success: function(html) {
				location.reload();
			}
		});
		return 0;
	}
</script>
<style>
	.input_box {
		display: flex;
		justify-content: space-between;
		width: 18%;
		padding: 5px;
		margin: 5px;
		border: 1px solid lightgrey;
		border-radius: 5px;
		background-color: white;
	}

	.input_box>label {
		margin: 0px !important;
		align-self: center;
	}
</style>