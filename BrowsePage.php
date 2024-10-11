<!DOCTYPE html>

<head>

<title> Browse Page </title>

<style>

td {
	border: 1px solid;
	text-align: center;
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
<th style="background-color:#ffb6c1"> <a href="BrowsePage.php"> <img src="BrowsePageLogo.jpg" height="50" width="50"> </a> </th>
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
<br>

<?php

session_start();

$success = "Item Has Been Added To Cart";
$failure = "Incorrect Quantity Selected. Try Again.";

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

$sql = "SELECT * FROM flowers";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<form name='OrderForm' action='BrowsePage.php' method='POST'>
			<div class='Flowers'>
			<table style='width:100%; table-layout: fixed;'>
			<tr>
				<td> <img src='".$row["Image"]."' height='150' width='200'> </td>
				<td> <b>Name:</b> ".$row["Name"]." </td>
				<td> <b>Height:</b> ".$row["Height"]." </td>
				<td> <b>Description:</b> ".$row["Description"]." </td>
				<td> <b>Price:</b> R".$row["Price"]." </td>
				<td> <b>Quantity:</b> <input type='number' name='".$row["Name"]."Q' value='' style='width: 50px'> </td>
				<td> <input type='submit' value='Add To Cart' name='SubmitButton'> </td>
			</tr>
			</table>
			</div>
			</form>";
		if (isset($_POST['SubmitButton'])) {
			if (isset($_POST[''.$row["Name"].'Q'])) {
				if ($_POST[''.$row["Name"].'Q'] > 0) {
					$_SESSION[''.$row["Name"].'Q'] = $_POST[''.$row["Name"].'Q'];
					echo "<script type='text/javascript'>alert('$success');</script>";
				}
				if ($_POST[''.$row["Name"].'Q'] <= 0) {
					echo "<script type='text/javascript'>alert('$failure');</script>";
				}
			}
		}
	}
}

mysqli_close($connect);

?>

</body>
</html>