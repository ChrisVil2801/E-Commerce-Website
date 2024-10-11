<!DOCTYPE html>

<head>

<title> Payment Page </title>

<style>

input[type="submit"] {
	font-size: 12pt;

</style>

</head>

<script>

function validateInfo() {
	var ccNum = document.forms["paymentForm"]["ccNum"].value;
	var css = document.forms["paymentForm"]["css"].value;
	var address = document.forms["paymentForm"]["address"].value;
	if (ccNum == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (css == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (address == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	}
}

</script>

<body align="center">

<?php

session_start();

$userID = $_SESSION['userID'];

$productOrder = $_SESSION['productOrder'];

$combinedPrice = $_SESSION['combinedPrice'];

$shippingFees = $combinedPrice / 10;

$totalPrice = $combinedPrice + $shippingFees;

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

echo "<form name='paymentForm' action='Payment.php' onsubmit='return validateInfo()' method='POST'>

<h1> Payment Page </h1> <br>

Enter Credit Card Number: <br>
<input type='text' name='ccNum' id='ccNum' value=''> <br> <br>

Enter CCS: <br>
<input type='text' name='css' id='css' value=''> <br> <br>

Enter Shipping Address: <br>
<input type='text' size='100' name='address' id='address' value=''> <br> <br>

Product Amount: R".$combinedPrice." <br> <br>

Shipping Fee Amount (10%): R".$shippingFees." <br> <br>

Total Amount: R".$totalPrice." <br> <br>

<input type='submit' name='paymentSubmit' value='Pay' action='Payment.php' method='POST'> <br> <br>

</form>";

if (isset($_POST["paymentSubmit"])) {
	
	$address = $_POST['address'];
	$ccNum = $_POST["ccNum"];
	
	
	
	$sql = "INSERT INTO userOrder (UserID, ProductID, CustomerAddress, OrderAmount, CreditCardNum)
	VALUES ('$userID', '$productOrder', '$address', '$totalPrice', '$ccNum')";

	if (mysqli_query($connect, $sql)) {
		header("Location: PaymentSuccess.php");
	} else {
		echo "Error: " . mysqli_error($connect);
	}
}

mysqli_close($connect);

?>

</body>
</html>