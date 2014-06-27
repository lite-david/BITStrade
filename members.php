
<html>
<head>
	<title> Sell </title>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<div class="border"><?php
session_start();
if($_SESSION['nick'] || $_SESSION['password'])
{
	echo "<B>You are logged in as ".$_SESSION['nick']."</B>";
	echo"<br>";
	echo "<a href=logout.php> Log out </a>";
	
}

else
{
	header("location:BITSsell.php?notify=Oops something went wrong");
}

?></div>

	<br>
	
	<h3><center> sale form <h3></center> 
	
	<br>
	
	Fill this form providing accurate but brief details about your product and how to contact you.

	<br>
	<br>
	
	<form action="sell_stuff.php" method="POST" >
	
		<input type="Text" name="name"  placeholder="name (optional)"><p>
		<input type="Text" name="hostel" placeholder="hostel"><p>
		<input type="Text" name="product" placeholder="product for sale"><p>
		<textarea rows="6" cols="30" name="details" placeholder="details about product (optional)"></textarea></p>
		<input type="Text" name="price" placeholder="price (optional)"><p>
		<input type="Text" name="number"placeholder="contact number"><p>
		<input type="submit" value="submit" name="submit" class="classname">
		
	</form>
	
	
	
	
	<?php
	if(isset($_GET['notify']))
	{
		echo htmlspecialchars($_GET['notify']);
	} 
	?>

	<a href="delete.php"> click here to delete your ad</a>
	
	
</body>

</html>

