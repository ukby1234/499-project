<div class="nav_bar">
	<ul class="nav_bar_left">
		<li><a href="/">Home</a></li>
		<li><a href="/articles">Articles</a></li>
		<li><a href="/aboutme">About Me</a></li>
		<?php if ($user && $user->id == 1): ?>
		<li><a href="/editor">New Article</a></li>
		<li><a href="/user">New User</a></li>
		<?php endif;?>
	</ul>
	<ul class="nav_bar_right">
		<li>
			<a style="float:left" href="<?php echo (!$user ? "/login" : "/profile"); ?>">
				<img style="float:left;vertical-align:middle" src="/images/icons/icon_<?php echo (!$user ? 0 : $user->id); ?>" width=28 height=28></img>
				<?php echo ($user ? $user->username : "Guest");?>
			</a>
		</li>
		<li>
			<?php if ($weather) :?>
				<a style="float:left;vertical-align:middle">Temperature: <?php echo ((float)$weather->main->temp - 273.15); ?> </a>
			<?php endif; ?>
		</li>
	</ul>
	<script language="javascript" type="text/javascript"  src="library/nav_bar.js"></script>
</div>
