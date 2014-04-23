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
				<form action="upload_avatar.php" method="post" enctype="multipart/form-data">
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
