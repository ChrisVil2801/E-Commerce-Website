<!DOCTYPE html>

<head>

<title> Admin Page </title>

<style>

.button {
	background: red;
	color: white;
	text-align: center;
	width: 10%;
	font-size: 20pt;
}

</style>

</head>

<body align="center">

<div class="Logo">
<a href="AdminPage.php"> <img src="Logo.jpg" height="475" style="width:100%"> </a>
</div>

<div class="Table">
<table style="width:100%">

<tr>
<th> <a href="AddProductPage.php"> <img src="AddProduct.jpg" height="350" width="350"> </a> </th>
<th> <a href="UpdateProductPage.php"> <img src="UpdateProduct.jpg" height="350" width="350"> </a> </th>
<th> <a href="DeleteProductPage.php"> <img src="DeleteProduct.jpg" height="350" width="350"> </a> </th>
</tr>

<tr>
<th> Add Product </th>
<th> Update Product </th>
<th> Delete Product </th>
</tr>

</table>
</div>

<form name="LogoutForm" action="SignUpPage.php">

<h1> <input type="submit" class="button" name="logout" value="Logout"> </h1>

</form>

</body>
</html>