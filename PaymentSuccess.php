<!DOCTYPE html>

<head>

<style>

p {
	font-size: 15pt;
}

</style>

</head>

<body align="center">

<div class="Logo">
<a href="HomePage.php"> <img src="Logo.jpg" height="150" style="width:100%"> </a>
</div>

<div class="Table">
<table style="width:100%; border: 1px solid">

<tr>
<th> <a href="HomePage.php"> <img src="HomePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="BrowsePage.php"> <img src="BrowsePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="AboutUsPage.php"> <img src="AboutUsPageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="CartPage.php"> <img src="CartPageLogo.jpg" height="50" width="50"> </a> </th>
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

<h1> Payment Successful! </h1> <br> <br>

<p> Your Order Has Been Received. </p> <br> <br>

<p> You May Now Continue Shopping. </p>

<?php

session_start();

$combinedPrice = 0;

$removed = "Item Has Been Successfully Removed From Cart";

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

$sql = "SELECT * FROM flowers";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		$_SESSION[''.$row["Name"].'Q'] = 0;
	}
}

mysqli_close($connect);

?>


</body>
</html>