<!DOCTYPE html>

<head>

<title> Sign Up Page </title>

<style>

input[type="submit"] {
	font-size: 12pt;
}

body {
	background-image: url('FlowerBG.jpg');
}

</style>

</head>

<script>

function validateInfo() {
	var fname = document.forms["SignUpForm"]["fname"].value;
	var lname = document.forms["SignUpForm"]["lname"].value;
	var email = document.forms["SignUpForm"]["email"].value;
	var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var cellNum = document.forms["SignUpForm"]["cellNum"].value;
	var username = document.forms["SignUpForm"]["username"].value;
	var password = document.forms["SignUpForm"]["password"].value;
	if (fname == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (lname == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (email == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (emailFormat.test(email) == false) {
	alert("Invalid Email Address. Please Enter Valid Email Address.")
	return false;
	} else if (cellNum == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (username == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (password == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	}
	
alert("Account Creation Successful");

}

</script>

<body align="center">

<form name="SignUpForm" onsubmit="return validateInfo()" action="SignUpPage.php" method="POST">

<h1> Fabio's Flowers </h1> <br>

<h2> Sign Up </h2> <br>

First Name: <br>
<input type="text" id="fname" name="fname" value=""> <br> <br>

Last Name: <br>
<input type="text" id="lname" name="lname" value=""> <br> <br>

Email Address: <br>
<input type="text" id="email" name="email" value=""> <br> <br>

Cellphone Number: <br>
<input type="text" id="cellNum" name="cellNum" value=""> <br> <br>

Username: <br>
<input type="text" id="username" name="username" value=""> <br> <br>

Password: <br>
<input type="text" id="password" name="password" value=""> <br> <br>

<input type="submit" name="signUp" value="Sign Up"> <br> <br>

</form>

<form action="LoginPage.php">

Already Signed Up? Login Below. <br> <br>

<input type="submit" value="Login"> <br>

<?php

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

if (isset($_POST["signUp"])) {
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$cellNum = $_POST['cellNum'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$success = "Account Succesfully Created";

	$sql = "INSERT INTO userDetails (FirstName, LastName, EmailAddress, CellNumber, Username, Password)
	VALUES ('$fname', '$lname', '$email', '$cellNum', '$username', '$password')";

	if (mysqli_query($connect, $sql)) {
		header("Location: LoginPage.php");
	} else {
		echo "Error: " . mysqli_error($connect);
	}
}

mysqli_close($connect);

?>

</form>
</body>
</html>