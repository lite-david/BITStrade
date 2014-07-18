<?php

session_start();

function validate($a)
	{
		$a=trim($a);
		$a=strip_tags($a);
		$a=mysql_real_escape_string($a);
		return $a;
	}
	$u='adminA7s7N4w'
	$p='TIt39Fe3ggE5'

if(isset($_POST['delete']))
{
	$product=validate($_POST['product']);
	mysql_connect("bitstrade-li8.rhcloud.com","$u","$p") or die("could not connect");
	mysql_select_db("bitstrade");
	mysql_query("DELETE from sell WHERE product='$product'");
}
	
?>
