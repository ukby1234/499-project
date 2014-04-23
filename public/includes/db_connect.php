<?php
	function check($value)
	{
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		$value = mysql_real_escape_string($value);
		return $value;
	}
	require("db.conf");
	$con = mysql_connect($host, $user, $password) or die('Could not connect: ' . mysql_error());
	mysql_query('SET NAMES utf8');
	mysql_select_db($database, $con);
?>
