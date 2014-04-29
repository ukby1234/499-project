<!DOCTYPE html>
<html>
	<head>
		<title>
				New Article
		</title>
		<link rel="stylesheet" href="/library/style.css">
		<script type="text/javascript">
		var old = '';
		function update()
		{
  			var textarea = document.f.ta;
  			var d = parent.dynamicframe.document; 
  			if (old != textarea.value)
  			{
    			old = textarea.value;
    			d.open();
    			d.write(old);
    			d.close();
  			}
 		 	window.setTimeout(update, 300);
		}
</script>
	</head>
	<body onload="update();">
		<?php include( __DIR__  . '/includes/top_nav.php')?>
		<?php include( __DIR__  . '/includes/header.html')?>
		<div class="pswindow">
			<h2>
				New Article
			</h2>
			<div class="content">
				<form name="f" method="post" action="/article">
				Title: <input type="text" name="title">
				<br />
				Content: <textarea id="canvas" name="ta" rows="10" cols="120"></textarea>
				<br />
				<input type="submit" name="submit" value="Submit">
				</form>
				<iframe frameborder=0 name="dynamicframe" id="dynamicframe"></iframe>
			</div>
		</div>
		<?php include( __DIR__  . '/includes/footer.html')?>
	</body>
</html>
