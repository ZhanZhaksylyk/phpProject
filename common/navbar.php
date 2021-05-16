<nav class="navbar navbar-expand bg-dark sticky-top">
	<ul class="navbar-nav" id="logo">
		<a href="music.php" class="nav-link">
			<img src="/phpproject/assets/images/music-logo.png" width="100">
		</a>
	</ul>
	<ul class="navbar-nav" id="invisible">
		<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="logoHref">
			<img src="/phpproject/assets/images/music-logo.png" width="100">
		</a>
		<div class="dropdown-menu">
		</div>
	</ul>
	<ul class="navbar-nav nav-tabs" id="content">
		<li class="nav-item">
			<a class="nav-link" href="profile.php" target="">Profile</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" target="">
				Who?
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="zhan.php" target="">
					Zhan Zhaksylyk
				</a>
				<a class="dropdown-item" href="miras.php" target="">
					Miras Tokanov
				</a>
				<a class="dropdown-item" href="beket.php" target="">
					Beket Samaluly
				</a>
				<a class="dropdown-item" href="margulan.php" target="">
					Margulan Sugirbay
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
				<form action="../functions/signout.php" style="margin-bottom:0px;">
					<button type="submit" class="btn btn-primary button">
						<span class="fas fa-user-lock" style="color: red; font-size: 1.5em;"></span>
						<a href="#" style="color: red; font-size: 1.2em;text-decoration: none;font-weight: 600;">Sign out</a>
					</button>
				</form>
			</li>
		<?php
		} else {
		?>
			<li class="nav-item">
				<button type="button" class="btn btn-primary button">
					<span class="fas fa-user-plus" style="color: red; font-size: 1.5em;"></span>
					<a href="/phpproject/pages/signup.php" style="color: red; font-size: 1.2em;text-decoration: none;font-weight: 600;">Sign up</a>
				</button>
			</li>
			<li class="nav-item pl-3">
				<button type="button" class="btn btn-primary button">
					<span class="fas fa-user-lock" style="color: red; font-size: 1.5em;"></span>
					<a href="/phpproject/pages/login.php" style="color: red; font-size: 1.2em;text-decoration: none;font-weight: 600;">Log in</a>
				</button>
			</li>
		<?php
		}
		?>
	</ul>
</nav>