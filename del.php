<?php

session_start();

function validate($a)
	{
		$a=trim($a);
		$a=strip_tags($a);
		$a=mysql_real_escape_string($a);
		return $a;
	}
	

if(isset($_POST['delete']))
{
	$product=validate($_POST['product']);
	mysql_connect("127.0.0.1","root","") or die("could not connect");
	mysql_select_db("bitstrade");
	mysql_query("DELETE from sell WHERE product='$product'");
}
	
?>
