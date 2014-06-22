<html>
<head>
	<title> BITStrade </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>
	<div class="border"><h1><center> BITStrade </center> </h1>
	<h3><center>Welcome to BITS Pilani, KK Birla, Goa campus' trading website.</center> <h3> </div>
	
	<br>
	<br>
	<B> Looking for something?<p> Try our search tool,search for the required item, and you will probably get a cheap deal </B>

	<form name="searchterm" action="search.php" method="GET">
		search term : <input type="Text" name="search"> <br><br>
		<input type="submit" value="submit" name="submit" class="classname">
	</form>
	<br>
	
	
	<br>
	<br>

	<b>Something you need to sell?<p></b>

	<form action="login.php" method="POST">
		Nick: <input type="Text" name="nick">
		Password: <input type="Password" name="password">
		<p><input type="submit" value="Login" name="login" class="classname"> 
	</form>
	<p> Or <a href="signup.php"> signup </a>
	<br>
	
	<?php
	if(isset($_GET['notify']))
	{
		echo "<br>".$_GET['notify'];
	} 
	?>
	


</body>
</html>
