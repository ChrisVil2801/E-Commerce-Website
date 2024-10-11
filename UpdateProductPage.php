<!DOCTYPE html>

<head>
<title> Add Product Page </title>
</head>

<body align="center">

<div class="Logo">
<a href="AdminPage.php"> <img src="Logo.jpg" height="150" style="width:100%"> </a>
</div>

<div class="Table">
<table style="width:100%; border: 1px solid">

<tr>
<th> <a href="AdminPage.php"> <img src="HomePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="AddProductPage.php"> <img src="AddProduct.jpg" height="50" width="50"> </a> </th>
<th style="background-color:#ffb6c1"> <a href="UpdateProductPage.php"> <img src="UpdateProduct.jpg" height="50" width="50"> </a> </th>
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

<h1> Update Product Page </h1>

<form name="ProductIDForm" action="UpdateProductPage.php" method="POST">

Enter Product ID: <br>
<input type="text" id="prodID" name="prodID" value=""> <br> <br>

<input type="submit" name="updateProduct" value="Select Product"> <br> <br>

</form>

<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

if (isset($_POST['updateProduct'])) {
	$_SESSION['prodID'] = $_POST['prodID'];
	$sql = "SELECT * FROM flowers WHERE FlowerID=".$_POST['prodID']."";
	$result = mysqli_query($connect, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "<form name='UpdateProductForm' action='UpdateProductPage.php' method='POST'>
				Flower Name: <br>
				<input type='text' id='fname' name='fname' value='".$row["Name"]."'> <br> <br>
				<input type='submit' name='fnameUpdate' value='Update Name'> <br> <br>

				Height: <br>
				<input type='text' id='height' name='height' value='".$row["Height"]."'> <br> <br>
				<input type='submit' name='heightUpdate' value='Update Height'> <br> <br>

				Description: <br>
				<input type='text' size='85' id='desc' name='desc' value='".$row["Description"]."'> <br> <br>
				<input type='submit' name='descUpdate' value='Update Description'> <br> <br>

				Price: <br>
				<input type='text' id='price' name='price' value='".$row["Price"]."'> <br> <br>
				<input type='submit' name='priceUpdate' value='Update Price'> <br> <br>

				Image: <br>
				<input type='text' id='image' name='image' value='".$row["Image"]."'> <br> <br>
				<input type='submit' name='imageUpdate' value='Update Image'> <br> <br>
				
				</form>";
		}
	}
}

if (isset($_POST['fnameUpdate'])) {
	$sql = "UPDATE flowers SET Name='".$_POST['fname']."' WHERE FlowerID=".$_SESSION['prodID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Name Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

if (isset($_POST['heightUpdate'])) {
	$sql = "UPDATE flowers SET Height='".$_POST['height']."' WHERE FlowerID=".$_SESSION['prodID']."";
					
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Height Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}
				
if (isset($_POST['descUpdate'])) {
	$sql = "UPDATE flowers SET Description='".$_POST['desc']."' WHERE FlowerID=".$_SESSION['prodID']."";
					
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Description Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}
				
if (isset($_POST['priceUpdate'])) {
	$sql = "UPDATE flowers SET Price='".$_POST['price']."' WHERE FlowerID=".$_SESSION['prodID']."";
					
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Price Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}
				
if (isset($_POST['imageUpdate'])) {
	$sql = "UPDATE flowers SET Image='".$_POST['image']."' WHERE FlowerID=".$_SESSION['prodID']."";
					
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Image Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

mysqli_close($connect);

?>

</body>
</html>