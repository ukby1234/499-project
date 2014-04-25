<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			Login
		</title>
		<link rel="stylesheet" href="library/style.css">
	</head>
	<body>
		<?php include( __DIR__  . '/includes/top_nav.php')?>
		<?php include( __DIR__  . '/includes/header.html')?>
		<div class="container">
		<div class="hfwindow second" >
			<h2>Register</h2>
			<div class="content">
				<?php if (Session::has('register')):?>
					<?php foreach (Session::get('register')->all() as $message) : ?>
					<p style="background-color:red;">
						<?php echo $message; ?>
					</p>
					<?php endforeach; ?>
					<?php endif; ?>
				<form name="form" action="/user" method="post">
					<div class="login">User Name</div>
					<input name="username" class="input"> <br />
					<div class="login">Location</div>
					<input name="location" class="input"> <br />
					<div class="login">Password</div>
					<input type="password" name="passwd" class="input" > <br />
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
		<div style="clear:both"> </div>
	</div>
		<?php include( __DIR__  . '/includes/footer.html')?>
	</body>
</html>
