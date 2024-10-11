<!DOCTYPE html>

<head>
<title> Delete Product Page </title>
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
<th> <a href="UpdateProductPage.php"> <img src="UpdateProduct.jpg" height="50" width="50"> </a> </th>
<th style="background-color:#ffb6c1"> <a href="DeleteProductPage.php"> <img src="DeleteProduct.jpg" height="50" width="50"> </a> </th>
</tr>

<tr>
<th> Home </th>
<th> Add Product </th>
<th> Update Product </th>
<th> Delete Product </th>
</tr>

</table>
</div>

<h1> Delete Product Page </h1>

<form name="DeleteProductForm" action="DeleteProductPage.php" method="POST">

Enter Product ID: <br>
<input type="text" id="prodID" name="prodID" value=""> <br> <br>

<input type="submit" name="deleteProduct" value="Delete Product"> <br> <br>

</form>

<?php

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

if (isset($_POST['deleteProduct'])) {
	$sql = "DELETE FROM flowers WHERE FlowerID=".$_POST['prodID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Product Has Been Successfully Deleted');</script>";
	} else {
		echo "<script type='text/javascript'>alert('Incorrect Input. Please Try Again');</script>";
		echo "Error: " . mysqli_error($conn);
	}
}

mysqli_close($connect);

?>

</body>
</html>