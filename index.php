<!DOCTYPE html>
<html>
	<head>
		<title>NSE</title>
	</head>
	<body>
		<h2>Stocks</h2>
		<div align="center">
			The easiest way to buy and sell stocks
			Stock analysis and screening tool
		</div>
		<div align="center">
			<form action="" method="GET">
				<label for="cmp"></label>
				<input list="cmps" name="cmp" id="cmp">
				<datalist id="cmps">
					<?php
								include ("config.php");
							$handle = mysqli_connect($host, $dbuser, $dbpass, $dbname);
							if (mysqli_connect_error())
							{
								echo "Unable to connect to database!";
							}
							else
							{

							  
								$result = mysqli_query($handle, "Select * from stocks");
								if (mysqli_num_rows($result) == false)
								{
									echo "<option value='No companies available'>";
								}
								else
								{
									while ($row = mysqli_fetch_array($result))
									{
										$name = $row[1];
										echo "<option value=$name>";
									}
									
								}
							}
						?>
					
	  
				</datalist>
			<input type="submit" name="submit">
			</form>
		</div>
	
<?php
if(isset($_GET["submit"])){
$value=$_GET["cmp"];
				
 $query = mysqli_query($handle, "Select * from stocks where Name='$value'");
    if($query){
        while ($row = mysqli_fetch_array($query))
        {
            $mc = $row[3];
            $dy = $row[7];
            $de= $row[10];
			$cp=$row[4];
			$roc=$row[8];
			$eps=$row[11];
			$stocks=$row[6];
			$roe=$row[9];
			$res=$row[12];
			$debt=$row[13];
		}
	
echo"<div align='center'>
	<h3>$value</h3>
	<table> 
	<tr>
	<td>Market Cap</td>
	<td>$mc</td>
	</div>";

	}
}
?>
</body>
	</html>