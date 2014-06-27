
<html>
<head>
	<title> SignUP </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="border"><B><I>Sign up, sell your goods!</B></I></h1>
	
	<h3>
	<form action="join.php" method="POST">
	 <input type="Text" name="nick" placeholder="Nick"><br><br>
	<input type="Password" name="password" placeholder="password">
	<p><input type="submit" value="submit" name="submit" class="classname"> 
	
	<?php
	if(isset($_GET['notify']))
	{
		echo htmlspecialchars($_GET['notify']);
	} 
?>

</body>
</html>
	