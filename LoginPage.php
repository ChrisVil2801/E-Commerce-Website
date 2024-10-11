<!DOCTYPE html>

<head>

<title> Login Page </title>

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
	var username = document.forms["LoginForm"]["username"].value;
	var password = document.forms["LoginForm"]["password"].value;
	if (username == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	} else if (password == "") {
	alert("All Information Fields Are Mandatory. Please Do Not Leave Them Empty.")
	return false;
	}
}

</script>

<body align="center">

<form name="LoginForm" onsubmit="return validateInfo()" action="LoginPage.php" method="POST">

<h1> Login </h1> <br>

Username: <br>
<input type="text" id="username" name="username" value=""> <br> <br>

Password: <br>
<input type="text" id="password" name="password" value=""> <br> <br>

<input type="submit" name="login" value="Login"> <br> <br>

</form>

<form action="SignUPPage.php">

Don't Have An Account? Sign Up Below. <br> <br>

<input type="submit" value="Sign Up"> <br>

</form>

<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

if (isset($_POST["login"])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM adminDetails";
	$output = mysqli_query($connect, $sql);

	if (mysqli_num_rows($output) > 0) {
		while($data = mysqli_fetch_assoc($output)) {
			if ($username == $data["Username"] & $password == $data["Password"]) {
				$_SESSION['adminID'] = $data["AdminID"];
				header("Location: AdminPage.php");
			}}
	}

	$sql = "SELECT * FROM userDetails";
	$output = mysqli_query($connect, $sql);

	if (mysqli_num_rows($output) > 0) {
		while($data = mysqli_fetch_assoc($output)) {
			if ($username == $data["Username"] & $password == $data["Password"]) {
				$_SESSION['fname'] = $data["FirstName"];
				$_SESSION['userID'] = $data["UserID"];
				header("Location: HomePage.php");
			}}
	// If user isnt redirected, the following message will display on their screen.
		echo "Incorrect Username or Password. Please Try Again.";
	}
}

mysqli_close($connect);

?>

</body>
</html>