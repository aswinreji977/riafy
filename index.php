<!DOCTYPE html>
<html>

<head>
    <title>NSE</title>
    <style>
        .value{
        			color:red;
        			font-weight:bold;
        		}
    </style>
</head>

<body>
    <h2>Stocks</h2>
    <div align="center">
        <b size="55px">The easiest way to buy and sell stocks</b>
        <p size="24px">Stock analysis and screening tool for investors in India
    </div>
    <div align="center">
        <form action="" method="GET">
            <label for="cmp">Search</label>
            <input list="cmps" name="cmp" id="cmp" onchange="this.form.submit()">
            <datalist id="cmps">
					<?php
					 include "config.php";
					 $handle = mysqli_connect($host, $dbuser, $dbpass, $dbname);
					 if (mysqli_connect_error()){
						 echo "Unable to connect to database!";
					 } 
					 else {
						 $result = mysqli_query($handle, "Select * from stocks");
						 if (mysqli_num_rows($result) == false) {
							 echo "<option value='No companies available'>";
						 } 
						 else {
							 while ($row = mysqli_fetch_array($result)) {
								 $name = $row[1];
								 echo "<option value='$name'>";
							 }
						 }
					 }
					?>
					
	  
				</datalist>
            <input type="submit" name="submit">
        </form>
    </div>

    <?php 
	if (isset($_GET["submit"])) {
    $value = $_GET["cmp"];

    $query = mysqli_query($handle, "Select * from stocks where Name='$value'");
    if (mysqli_num_rows($query) == true) {
        while ($row = mysqli_fetch_array($query)) {
            $value = $row[1];
            $mc = $row[3];
            $dy = $row[5];
            $de = $row[8];
            $cp = $row[2];
            $roc = $row[6];
            $eps = $row[9];
            $stock = $row[4];
            $roe = $row[7];
            $res = $row[10];
            $debt = $row[11];
        }

        echo "<div align='center'>
				<table cellspacing='20px'>
					<caption style='text-align:left'><b>$value</b></caption>
						<tr>
							<td>Market Cap</td>
							<td class='value'>₹ $mc</td>
							<td>Dividend Yield</td>
							<td class='value'>$dy%</td>
							<td>Debt Equality</td>
							<td class='value'>$de%</td>
						</tr>
						<tr>
							<td>Current Price</td>
							<td class='value'>₹ $cp</td>
							<td>ROCE</td>
							<td  class='value'>$roc%</td>
							<td>EPS</td>
							<td class='value'>₹ $eps</td>
						</tr>
						<tr>
							<td>Stock PE</td>
							<td class='value'>$stock%</td>
							<td>ROE</td>
							<td class='value'>$roe%</td>
							<td>Reserves</td>
							<td class='value'>₹ $res</td>
						</tr>
						<tr>
						<td>Debt</td>
						<td class='value'>₹ $debt</td>
						</tr>
				</table>
			</div>";
    }
	} 
?>
</body>

</html>
