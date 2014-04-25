<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>
			ArchBuddhiCat's Temple
		</title>
		<link rel="stylesheet" href="/library/style.css">
	</head>
	<body>
		<?php include( __DIR__  . '/includes/top_nav.php')?>
		<?php include( __DIR__  . '/includes/header.html')?>
		<div class="pswindow">
			<h2><?php echo $article->title;?></h2>
			<div class="content">
				<?php echo $article->content;?><hr />
				<p>Comments: </p>
				<?php foreach ($comments as $comment) :  ?>
				<?php	$c += 1; ?>
				<?php	$uid = ($comment->user) ? $comment->user->id : 0;?>
				<div class="guestbook_title">
					<img src="/images/icons/icon_<?php echo $uid; ?>" width=34 height=34></img>
					<?php echo ($comment->user) ? $comment->user->username : "Guest"; ?>
					<span class="date"> <?php echo $comment->date; ?></span>
				</div>
				<div class="guestbook_content<?php echo ($c % 2) ;?>">
					<?php echo (htmlentities($comment->content, ENT_QUOTES, "UTF-8"))?>
				</div>
				<?php endforeach; ?>
				<br />
			<form name="form" method="post" action="/comment">
			Post a comment:<textarea name="comments"></textarea>
				<input type="hidden" name="id" value="<?php echo $article->id; ?>">
				<input type="submit" name="submit" value="Submit">
			</form>
			</div>
		</div>
		<?php include( __DIR__  . '/includes/footer.html')?>
	</body>
</html>
