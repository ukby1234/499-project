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
		<div class="hfwindow">
			<h2>Login</h2>

			<div class="content">
				<?php if (Session::has('login')):?>
				<?php echo Session::get('login'); ?>
				<?php endif; ?>
				<form name="form" action="/login" method="post">
					<div class="login">User Name</div>
					<input name="username" class="input"> <br />
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
