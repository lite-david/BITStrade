<?php

session_start();
if(isset($_POST['login']))
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
			header("location:members.php");
		}
		
		else
		{
			header("location:index.php? notify= incorrect nick and password combination");
				
		}
		

	}
	
	else
	{
		header("location:index.php? notify=Please fill both the fields");
	}
	
}
		
?>	
	
	




