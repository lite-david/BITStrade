<?php
session_start();

if(isset($_POST['submit']))
{

	function validate($a)
	{
		$a=trim($a);
		$a=strip_tags($a);
		$a=mysql_real_escape_string($a);
		return $a;
	}
	
	$nick=validate($_POST['nick']);
	$password=validate($_POST['password']);
	$u='adminA7s7N4w';
	$p='TIt39Fe3ggE5';
	
	if( $nick && $password)
	{
		$connect=mysql_connect("bitstrade-li8.rhcloud.com","$u","$p") or die("Could not connect");
		mysql_select_db("bitstrade");
		$signup=mysql_query("SELECT * FROM users WHERE nick='$nick'");
		$a=mysql_fetch_assoc($signup);
		while($a=mysql_fetch_assoc($signup))
		{
			$dbnick = $a['nick'];
			$dbpassword = $a['password'];
		}
		if($dbnick == $nick)
		{
			header("location:signup.php?notify=Nick already exists.Give a new one");
		}
		else
		{
			mysql_query("INSERT INTO users(nick,password) VALUES ('$nick','$password')");
			$_SESSION['nick']=$nick;
			$_SESSION['password']=$password;
			header("location:members.php");
		}
	
	}
	else
	{
	header("location:index.php? notify=Please fill both fields");
	}
}
?>

