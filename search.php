<?php

session_start();
$output='';	
if(isset($_GET['submit']))
{
	function validate($a)
	{
		$a=trim($a);
		$a=strip_tags($a);
		$a=mysql_real_escape_string($a);
		return $a;
	}
	
	$search=validate($_GET['search']);
	$u='adminA7s7N4w';
	$p='TIt39Fe3ggE5';
	
	if($search)
	{
		mysql_connect("bitstrade-li8.rhcloud.com","$u","$p") or die("Could not connect");
		mysql_select_db("bitstrade");
		$search= preg_replace("#[^0-9a-z]#i","","$search");
		$query= mysql_query("SELECT * FROM sell WHERE nick LIKE '%$search%' OR product LIKE '%$search%'");
		$count= mysql_num_rows($query);
		
		if($count == 0)
		{
			echo "sorry nothing matched your search term!";
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
				
				
				$output.='<div>nick: '.$nick.'<br> product: '.$product.'<br>details: '.$details.'<br>price: '.$price.'<br> contact: '.$number.'<br>hostel: '.$hostel.'</div><br><br>';
			}
		}
	}	
		
	else
	{
		header("location:index.php?notify=Enter a valid search term");
	}
}
?>
<?php

print("$output"); 
?>

