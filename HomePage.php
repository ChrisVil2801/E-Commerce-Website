<!DOCTYPE html>

<head>

<title> Home Page </title>

</head>

<body align="center">

<div class="Logo">
<a href="HomePage.php"> <img src="Logo.jpg" height="475" style="width:100%"> </a>
</div>

<?php

session_start();

echo "
<h1> Welcome ".$_SESSION['fname']." </h1>
"

?>

<div class="Table">
<table style="width:100%">

<tr>
<th> <a href="HomePage.php"> <img src="HomePageLogo.jpg" height="350" width="350"> </a> </th>
<th> <a href="BrowsePage.php"> <img src="BrowsePageLogo.jpg" height="350" width="350"> </a> </th>
<th> <a href="AboutUsPage.php"> <img src="AboutUsPageLogo.jpg" height="350" width="350"> </a> </th>
<th> <a href="CartPage.php"> <img src="CartPageLogo.jpg" height="350" width="350"> </a> </th>
<th> <a href="AccountPage.php"> <img src="AccountPageLogo.jpg" height="350" width="350"> </a> </th>
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

</body>
</html>