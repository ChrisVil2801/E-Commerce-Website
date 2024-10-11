<!DOCTYPE html>

<head>
<title> Add Product Page </title>
</head>

<script>

function validateInfo() {
	var fname = document.forms["AddProductForm"]["fname"].value;
	var height = document.forms["AddProductForm"]["height"].value;
	var desc = document.forms["AddProductForm"]["desc"].value;
	var price = document.forms["AddProductForm"]["price"].value;
	var image = document.forms["AddProductForm"]["image"].value;
	if (fname == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (height == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (desc == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (price == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (image == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	}
}

</script>

<body align="center">

<div class="Logo">
<a href="AdminPage.php"> <img src="Logo.jpg" height="150" style="width:100%"> </a>
</div>

<div class="Table">
<table style="width:100%; border: 1px solid">

<tr>
<th> <a href="AdminPage.php"> <img src="HomePageLogo.jpg" height="50" width="50"> </a> </th>
<th style="background-color:#ffb6c1"> <a href="AddProductPage.php"> <img src="AddProduct.jpg" height="50" width="50"> </a> </th>
<th> <a href="UpdateProductPage.php"> <img src="UpdateProduct.jpg" height="50" width="50"> </a> </th>
<th> <a href="DeleteProductPage.php"> <img src="DeleteProduct.jpg" height="50" width="50"> </a> </th>
</tr>

<tr>
<th> Home </th>
<th> Add Product </th>
<th> Update Product </th>
<th> Delete Product </th>
</tr>

</table>
</div>

<h1> Add Product Page </h1>

<form name="AddProductForm" onsubmit="return validateInfo()" action="AddProductPage.php" method="POST">

Flower Name: <br>
<input type="text" id="fname" name="fname" value=""> <br> <br>

Height: <br>
<input type="text" id="height" name="height" value=""> <br> <br>

Description: <br>
<input type="text" id="desc" name="desc" value=""> <br> <br>

Price: <br>
<input type="text" id="price" name="price" value=""> <br> <br>

Image: <br>
<input type="text" id="image" name="image" value=""> <br> <br>

<input type="submit" name="addProduct" value="Add Product">

</form>

<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

if (isset($_POST["addProduct"])) {
	
	$adminID = $_SESSION['adminID'];
	$fname = $_POST['fname'];
	$height = $_POST['height'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$image = $_POST['image'];

	$sql = "INSERT INTO flowers (Name, Height, Description, Price, Image, AdminAddID)
	VALUES ('$fname', '$height', '$desc', '$price', '$image', '$adminID')";

	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Product Added');</script>";
	} else {
		echo "Error: " . mysqli_error($connect);
	}
}

mysqli_close($connect);

?>

</body>
</html>