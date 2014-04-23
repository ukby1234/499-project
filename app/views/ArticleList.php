<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>
			ArchBuddhiCat's Temple
		</title>
		<link rel="stylesheet" href="/library/style.css">
	</head>
	<body>
		<?php include( __DIR__ . '/includes/top_nav.php');?>
		<?php include( __DIR__ . '/includes/header.html');?>
		<div class="pswindow">
			<h2>Article List</h2>
			<div class="content">
				<?php foreach($articles as $article) :  ?>
					<h3 class="article_title">
						<a href="article/<?php echo $article->id;?>">
							<?php echo $article->title;?>
						</a>
					</h3>
					<span class="date" style="float:left"> 
						<?php echo $article->date;?>
					</span>
					<br />
						<?php echo $article->content;?>
					<br />
					<hr>
				<?php endforeach; ?>
			</div>
		</div>
		<?php include( __DIR__ . '/includes/footer.html');?>
	</body>
</html>
