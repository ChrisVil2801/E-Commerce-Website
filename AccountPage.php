<!DOCTYPE html>

<head>

<title> Account Page </title>

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
<a href="HomePage.php"> <img src="Logo.jpg" height="150" style="width:100%"> </a>
</div>

<div class="Table">
<table style="width:100%; border: 1px solid">

<tr>
<th> <a href="HomePage.php"> <img src="HomePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="BrowsePage.php"> <img src="BrowsePageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="AboutUsPage.php"> <img src="AboutUsPageLogo.jpg" height="50" width="50"> </a> </th>
<th> <a href="CartPage.php"> <img src="CartPageLogo.jpg" height="50" width="50"> </a> </th>
<th style="background-color:#ffb6c1"> <a href="AccountPage.php"> <img src="AccountPageLogo.jpg" height="50" width="50"> </a> </th>
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

<h1> Change Account Details Or Logout </h1>

<form name="AccountForm" action="AccountPage.php" method="POST">

First Name: <br>
<input type="text" id="fname" name="fname" value=""> <br> <br>
<input type="submit" name="fnameChange" value="Change First Name"> <br> <br>

Last Name: <br>
<input type="text" id="lname" name="lname" value=""> <br> <br>
<input type="submit" name="lnameChange" value="Change Last Name"> <br> <br>

Email Address: <br>
<input type="text" id="email" name="email" value=""> <br> <br>
<input type="submit" name="emailChange" value="Change Email"> <br> <br>

Cellphone Number: <br>
<input type="text" id="cellNum" name="cellNum" value=""> <br> <br>
<input type="submit" name="cellNumChange" value="Change Cellphone Number"> <br> <br>

Username: <br>
<input type="text" id="username" name="username" value=""> <br> <br>
<input type="submit" name="usernameChange" value="Change Username"> <br> <br>

Password: <br>
<input type="text" id="password" name="password" value=""> <br> <br>
<input type="submit" name="passwordChange" value="Change Password"> <br>

</form>

<form name="LogoutForm" action="SignUpPage.php">

<h1> <input type="submit" class="button" name="logout" value="Logout"> </h1>

</form>

<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "fabioFlowers");

// Test if database is connected
if($connect === false){
	die("Error: Connection Failed. " . mysqli_connect_error());
}

if (isset($_POST['fnameChange'])) {
	$sql = "UPDATE userDetails SET FirstName='".$_POST['fname']."' WHERE UserID=".$_SESSION['userID']."";
	$_SESSION['fname'] = $_POST['fname'];
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('First Name Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

if (isset($_POST['lnameChange'])) {
	$sql = "UPDATE userDetails SET LastName='".$_POST['lname']."' WHERE UserID=".$_SESSION['userID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Last Name Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

if (isset($_POST['emailChange'])) {
	$sql = "UPDATE userDetails SET EmailAddress='".$_POST['email']."' WHERE UserID=".$_SESSION['userID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Email Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

if (isset($_POST['cellNumChange'])) {
	$sql = "UPDATE userDetails SET CellNumber='".$_POST['cellNum']."' WHERE UserID=".$_SESSION['userID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Cellphone Number Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

if (isset($_POST['usernameChange'])) {
	$sql = "UPDATE userDetails SET Username='".$_POST['username']."' WHERE UserID=".$_SESSION['userID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Username Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

if (isset($_POST['passwordChange'])) {
	$sql = "UPDATE userDetails SET LastName='".$_POST['password']."' WHERE UserID=".$_SESSION['userID']."";
	
	if (mysqli_query($connect, $sql)) {
		echo "<script type='text/javascript'>alert('Password Has Been Successfully Updated');</script>";
	} else {
		echo "Error updating record: " . mysqli_error($connect);
	}
}

mysqli_close($connect);

?>

</body>
</html>