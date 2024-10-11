<!DOCTYPE html>

<head>

<title> Cart Page </title>

<style>

td {
	border: 1px solid;
	text-align: center;
}

.button {
	background: green;
	color: white;
	text-align: center;
	width: 100%;
	font-size: 20pt;
}

</style>

</head>

<body>

<div class="Logo">
<a href="HomePage.php"> <img src="Logo.jpg" height="150" style="width:100%"> </a>
</div>

<div class="Table">
<table style="width:100%; border: 1px solid">

<tr>
<th> <a href="HomePage.php"> <img src="HomePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="BrowsePage.php"> <img src="BrowsePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="AboutUsPage.php"> <img src="AboutUsPageLogo.jpg" height="50" width="50"> </a> </th>
<th style="background-color:#ffb6c1"> <a href="CartPage.php"> <img src="CartPageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="AccountPage.php"> <img src="AccountPageLogo.jpg" height="50" width="50"> </a> </th>
</tr>

<tr>
<th> Home </th>
<th> Browse </th>
<th> About Us </th>
<th> Cart </th>
<th> Account </th>
</tr>

</table>
</div>

<?php

session_start();

$combinedPrice = 0;

$removed = "Item Has Been Successfully Removed From Cart";

$productList = array();

$index = 0;

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

$sql = "SELECT * FROM flowers";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		if (isset($_SESSION[''.$row["Name"].'Q'])) {
			if ($_SESSION[''.$row["Name"].'Q'] > 0) {
				echo "<form name='RemoveForm' action='CartPage.php' method='POST'>
				<table style='width:100%; table-layout: fixed;'>
				<tr>
					<td> <img src='".$row["Image"]."' height='150' width='200'> </td>
					<td> <b>Name:</b> ".$row["Name"]." </td>
					<td> <b>Price:</b> R".$row["Price"]." </td>
					<td> <b>Quantity:</b> ".$_SESSION[''.$row["Name"].'Q']." </td>
					<td> <b>Total Price:</b> R".($row["Price"] * $_SESSION[''.$row["Name"].'Q'])."
					<td> <input type='submit' value='Remove From Cart' name='remove".$row["Name"]."'> </td>
				</tr>
				</table>
				</form>";
				if (isset($_POST['remove'.$row["Name"].''])) {
					$_SESSION[''.$row["Name"].'Q'] = 0;
					echo "<script type='text/javascript'>alert('$removed');</script>";
					header("Refresh:1");
				};
				$productList[$index] = $row["FlowerID"];
				$index = $index + 1;
				$combinedPrice = $combinedPrice + ($row["Price"] * $_SESSION[''.$row["Name"].'Q']);
			}
		}
	}
}

echo "<table style='width:100%; table-layout: fixed;'>
<tr>
	<td style='font-size: 20pt'> <b>Total Combined Price:</b> R".$combinedPrice."
	</tr>
	</table>";

$_SESSION['combinedPrice'] = $combinedPrice;

$productOrder = "";

if ($productList != array()) {
	$productOrder = $productOrder . $productList[0];
}

for ($x = 1; $x < count($productList); $x += 1) {
	$productOrder = $productOrder . ", " . $productList[$x];
};

$_SESSION['productOrder'] = $productOrder;

mysqli_close($connect);

?>

<form name="CheckoutButton" action="Payment.php" method="POST">

<input class="button" type="submit" value="Checkout" name="checkoutButton">

</form>
</body>
</html>