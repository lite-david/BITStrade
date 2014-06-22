<?php

session_start();

if(isset($_POST['submit']))
{
	$name=mysql_real_escape_string($_POST['name']);
	$hostel=mysql_real_escape_string($_POST['hostel']);
	$product=mysql_real_escape_string($_POST['product']);
	$details=mysql_real_escape_string($_POST['details']);
	$price=mysql_real_escape_string($_POST['price']);
	$number=mysql_real_escape_string($_POST['number']);
	$nick=$_SESSION['nick'];
	if( $hostel && $product && $number)
	{
		mysql_connect("127.0.0.1","root","") or die("could not connect");
		mysql_select_db("bitstrade");
		mysql_query("INSERT INTO sell(nick,name,hostel,product,details,price,contact)VALUES('$nick','$name','$hostel','$product','$details','$price','$number')");
		//echo "<B> congrats data addded successfully</B>";
		header("location:members.php?notify=Success");
	
		
	
	
	
	}
	
	else
	{
		header("location:members.php?notify=Enter all the necessary fields");
	}








}
 
?>
