<?php

session_start();
if(isset($_POST['login']))
{
	$nick=mysql_real_escape_string($_POST['nick']);
	$password=mysql_real_escape_string($_POST['password']);
	
	if($nick && $password)
	{
		$connect= mysql_connect("127.0.0.1","root","") or die("cannot connect");
		mysql_select_db("bitstrade");
		$login=mysql_query("SELECT * FROM users WHERE nick='$nick'");
		while($log=mysql_fetch_assoc($login))
		{
			$dbnick = $log['nick'];
			$dbpassword = $log['password'];
		}
		
		if( $nick==$dbnick && $password==$dbpassword )
		{
			$_SESSION['nick'] = $dbnick;
			$_SESSION['password'] = $dbpassword;
			header("location:http://localhost/members.php");
		}
		
		else
		{
			header("location:http://localhost/BITSsell.php? notify= incorrect nick and password combination");
		}
		

	}
	
	else
	{
		header("location:http://localhost/BITSsell.php? notify=Please fill both the fields");
	}
	
}
		
?>	
	
	




