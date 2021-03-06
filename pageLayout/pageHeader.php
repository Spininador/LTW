<?php
	$user_logged = isset($_SESSION['username']);
	$invalid_password = isset($_GET['errlog']) && $_GET['errlog'] == 1;
?>

<div id="page_header">
	<label id="website_name">DineAdvisor</label>
	<a href="index.php">
		<div id="stock_img"> 
			<img src="./resources/restaurant_stock.jpg" />
		</div>
	</a>
	<div id="login_area">
		<?php if(!$user_logged):?>
		<form action="php/login.php" method="post">
			<div id="usernameThings" />
				<label id="username_label">Username</label>
				<input id="username_input" name="username_input" type="text" required>
			</div>
			<div id="passwordThings" />
				<label id="password_label">Password</label>
				<input id="password_input" name="password_input" type="password" required>
			</div>
			<?php if($invalid_password): 
			echo '<label class="incorrect">Incorrect username/password</label><br>';
			endif;?>
			<input id="login_btn" type="submit" value="Login">
		</form>
		<input id="register_btn" type="button" onclick="window.location = 'register.php';" value="Register">
		
		<?php else:?>
		
		<form id="my_profile" action="profile.php<?php echo '?username=' . $_SESSION['username'];?>" method="post">
			<label id="user_name"><?php echo $_SESSION['username']; ?></label>
			<br>
			<input id="profile_btn" type="submit" value="My Profile">
		</form>

		<form action="php/logout.php" method="post">
			<input id="logout_btn" type="submit" value="Logout">
		</form>
		
		<?php endif;?>
	</div>
</div>