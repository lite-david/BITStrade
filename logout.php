<?php
session_start();

if($_SESSION['nick'] || $_SESSION['password'])
{
	session_destroy();
	header("location:index.php? notify= logged out");
}



?>
