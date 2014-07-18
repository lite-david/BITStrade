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

	$name=validate($_POST['name']);
	$hostel=validate($_POST['hostel']);
	$product=validate($_POST['product']);
	$details=validate($_POST['details']);
	$price=validate($_POST['price']);
	$number=validate($_POST['number']);
	$nick=validate($_SESSION['nick']);
	
	$u='adminA7s7N4w';
	$p='TIt39Fe3ggE5';
	
	if( $hostel && $product && $number)
	{
		mysql_connect("bitstrade-li8.rhcloud.com","$u","$p") or die("could not connect");
		mysql_select_db("bitstrade");
		mysql_query("INSERT INTO sell(nick,name,hostel,product,details,price,contact)VALUES('$nick','$name','$hostel','$product','$details','$price','$number')");
		header("location:members.php?notify=Success");
	
		
	
	
	
	}
	
	else
	{
		header("location:members.php?notify=Enter all the necessary fields");
	}








}
 
?>
