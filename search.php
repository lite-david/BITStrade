<?php

session_start();
$output='';	
if(isset($_GET['submit']))
{
	$search=mysql_real_escape_string($_GET['search']);
	
	if($search)
	{
		mysql_connect("127.0.0.1","root","") or die("Could not connect");
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
				$nick=$l['nick'];
				$product=$l['product'];
				$hostel=$l['hostel'];
				$details=$l['details'];
				$number=$l['contact'];
				$name=$l['name'];
				$price=$l['price'];
				
				
				$output.='<div>nick: '.$nick.'<br> product: '.$product.'<br>details: '.$details.'<br>price: '.$price.'<br> contact: '.$number.'<br>hostel: '.$hostel.'</div><br><br>';
			}
		}
	}	
		
	else
	{
		header("location:BITSsell.php?notify=Enter a valid search term");
	}
}
?>
<?php

print("$output"); 
?>

