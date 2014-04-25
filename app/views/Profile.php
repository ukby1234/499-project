<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			User Profile
		</title>
		<link rel="stylesheet" href="library/style.css">
	</head>
	<body>
		<?php include( __DIR__  . '/includes/top_nav.php')?>
		<?php include( __DIR__  . '/includes/header.html')?>
		<div class="pswindow">
			<h2>
				Profile of <?php echo $user->username; ?>
			</h2>
			<div class="content">
				Name: <?php echo $user->username; ?><br />	
				<form action="/avatar" method="post" enctype="multipart/form-data">
					<?php if (Session::has('errors')):?>
					<?php foreach (Session::get('errors')->all() as $message) : ?>
					<p style="background-color:red;">
						<?php echo $message; ?>
					</p>
					<?php endforeach; ?>
					<?php endif; ?>
					<label for="file">Upload new avatar:</label>	
					<input type="file" name="file" id="file" /> 
					<br />
					<input type="submit" name="submit" value="Submit" />
				</form>


				<a href="/logout">Logout</a><br />
			</div>
		</div>
		<?php include( __DIR__  . '/includes/footer.html')?>
	</body>
</html>
