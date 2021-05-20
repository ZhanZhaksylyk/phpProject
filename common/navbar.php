<nav class="navbar navbar-expand bg-dark sticky-top">
	<ul class="navbar-nav" id="logo">
		<a href="/phpProject/pages/music.php" class="nav-link">
			<img src="/phpProject/assets/images/music-logo.png" width="100">
		</a>
	</ul>
	<ul class="navbar-nav" id="invisible">
		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="logoHref">
			<img src="/phpProject/assets/images/music-logo.png" width="100">
		</a>
		<div class="dropdown-menu">
		</div>
	</ul>
	<ul class="navbar-nav nav-tabs" id="content">
		<li class="nav-item">
			<a class="nav-link" href="/phpProject/pages/profile.php" target="">Profile</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" target="">
				Hobbies
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="/phpProject/pages/books/index.php" target="">
					Books
				</a>
			</div>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto" id="User">
		<li class="nav-item">
			<h1 id="session">
				<?php
				if (isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
					echo $_SESSION['user'];
				}
				?>
			</h1>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto" id="signing">
		<?php
		if ((isset($_SESSION['user']) && !is_null($_SESSION['user']))) {
		?>
			<li class="nav-item pl-3">
				<button type="submit" class="btn btn-primary button" onclick="signout()">
					<span class="fas fa-user-lock" style="color: red; font-size: 1.5em;"></span>
					<a href="#" style="color: red; font-size: 1.2em;text-decoration: none;font-weight: 600;">Sign out</a>
				</button>
			</li>
		<?php
		} else {
		?>
			<li class="nav-item">
				<a href="/phpProject/pages/auth/signup.php">
					<button type="button" class="btn btn-primary button">
						<span class="fas fa-user-plus" style="color: red; font-size: 1.5em;"></span>
						<span style="color: red; font-size: 1.2em;text-decoration: none;font-weight: 600;">Sign up</span>
					</button>
				</a>
			</li>
			<li class="nav-item pl-3">
				<a href="/phpProject/pages/auth/login.php">
					<button type="button" class="btn btn-primary button">
						<span class="fas fa-user-lock" style="color: red; font-size: 1.5em;"></span>
						<span style="color: red; font-size: 1.2em;text-decoration: none;font-weight: 600;">Log in</span>
					</button>
				</a>
			</li>
		<?php
		}
		?>
	</ul>
</nav>
<script>
function signout(){
	$.ajax({
		type: "POST",
		url: '/phpProject/functions/signout.php',
		data:{action:'signout'},
		success:function(html) {
			location.reload();
		}
	});
}
</script>