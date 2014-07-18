
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

session_start();
$output='';

	$u='adminA7s7N4w';
	$p='TIt39Fe3ggE5';

	
	$nick=mysql_real_escape_string($_SESSION['nick']);
	
	if($nick)
	{
		mysql_connect("bitstrade-li8.rhcloud.com","$u","$p") or die("Could not connect");
		mysql_select_db("bitstrade");
		$query= mysql_query("SELECT * FROM sell WHERE nick='$nick'");
		$count= mysql_num_rows($query);
		
		if($count == 0)
		{
			echo "sorry you have no ad's";
		}
		
		else
		{
			while($l=mysql_fetch_array($query))
			{
				$nick=htmlspecialchars($l['nick']);
				$product=htmlspecialchars($l['product']);
				$hostel=htmlspecialchars($l['hostel']);
				$details=htmlspecialchars($l['details']);
				$number=htmlspecialchars($l['contact']);
				$name=htmlspecialchars($l['name']);
				$price=htmlspecialchars($l['price']);
				
				
				$output.='<div><form action="del.php" method="POST">nick: '.$nick.'<br> product: '.$product.'<input type="hidden" name="product" value="'.$product.'"><br>details: '.$details.'<br>price: '.$price.'<br> contact: '.$number.'<br>hostel:
				'.$hostel.' <br><input type="submit" name="delete" value="delete" class="classname"> </form></div><br><br>';
			}
		}
	}	
		
	else
	{
		header("location:index.php?notify=Enter a valid search term");
	}

?>
<?php

print("$output"); 
?>




</body>
</html>

