<?php

session_start();

if(isset($_POST['delete']))
{
	$product=$_POST['product'];
	mysql_connect("127.0.0.1","root","") or die("could not connect");
	mysql_select_db("bitstrade");
	mysql_query("DELETE from sell WHERE product='$product'");
}
	
?>
