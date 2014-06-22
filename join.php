<?php
session_start();

if(isset($_POST['submit']))
{
	$nick=mysql_real_escape_string($_POST['nick']);
	$password=mysql_real_escape_string($_POST['password']);
	
	if( $nick && $password)
	{
		$connect=mysql_connect("127.0.0.1","root","") or die("Could not connect");
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
	header("location:BITSsell.php? notify=Please fill both fields");
	}
}
?>

