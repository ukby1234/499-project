<?php
	function username(){
		if (userid() == 0){
			return "Guest";
		} else 
			return ($_SESSION['name']);
	}
	function userid(){
		$expire_time = 1800;
		if (isset($_SESSION['id'])){
			return ($_SESSION['id']);
		} else {
			if (isset($_COOKIE['username']) and isset($_COOKIE['ulamog']))
			{
				include_once('db_connect.php');
				$username = check($_COOKIE['username']);
				$t0 = intval($_COOKIE['ulamog']);
				$result = mysql_query("SELECT * FROM reauth WHERE username='$username' AND token=$t0");
				if (mysql_num_rows($result)) {
					$t1 = rand();
					mysql_query("UPDATE reauth SET token=$t1 WHERE token=$t0");
					setcookie('ulamog', $t1, time() + $expire_time);
					$result = mysql_query("SELECT id FROM users WHERE username='$username'");
					$row = mysql_fetch_row($result);
					$id = $row[0];
					$_SESSION['id'] = $id;
					$_SESSION['name'] = $username;
					return $id;
				} else {
					setcookie('username', NULL);
					setcookie('ulamog', NULL);
					return 0;
				}
			}
			return 0;
		}
	}
	function isadmin(){
		return (userid() == 1);
	} 
	function check_admin() {
		if(!isadmin()){die(); }
	}
	function check_user() {
		if(!userid()){die(); }
	}
	function check_guest() {
		if(userid()){die(); }
	}
	session_start();
?>
