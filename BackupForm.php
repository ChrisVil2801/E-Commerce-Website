<form name="CartForm" action="BrowsePage.php" method="POST">

<div class="Flowers">
<table style="width:100%">

<tr>
<td> <img src="Malva.jpg" height="150" width="200"> </td>
<td> <b>Name:</b> Malva </td>
<td> Height: 60cm - 1.2m </td>
<td> Description: Malva is a vigorous plant that contains purple and pink blooms with stripes that spread outwards </td>
<td> Price: R75 </td>
<td> Quantity: <input type="number" name="malvaQ" value="" style="width: 50px"> </td>
<td> <input type="submit" value="Add To Cart" name="SubmitButton"> </td>
</tr>

<tr>
<td> <img src="Tithonia.jpg" height="150" width="200"> </td>
<td> <b>Name:</b> Tithonia </td>
<td> Height: 60cm - 1.2m </td>
<td> Description: Similar appearance and characteristics to the sunflower, yet can thrive in poorer soil conditons. Attracts Butterflies. </td>
<td> Price: R325 </td>
<td> Quantity: <input type="number" name="tithoniaQ" value="" style="width: 50px"> </td>
<td> <input type="submit" value="Add To Cart" name="SubmitButton"> </td>
</tr>

<tr>
<td> <img src="Windflower.jpg" height="150" width="200"> </td>
<td> <b>Name:</b> Windflower </td>
<td> Height: 10cm - 15cm </td>
<td> Description: Blooms in early spring. Comes in white, blue, violet, pink and indigo colours. </td>
<td> Price: R30 </td>
<td> Quantity: <input type="number" name="windQ" value="" style="width: 50px"> </td>
<td> <input type="submit" value="Add To Cart" name="SubmitButton"> </td>
</tr>

<tr>
<td> <img src="Cosmos.jpg" height="150" width="200"> </td>
<td> <b>Name:</b> Cosmos </td>
<td> Height: 30cm - 2m </td>
<td> Description: Cosmos is a type of sunflower that can grow up to 2 meters. Can bloom in shades of white, red, pink, orange and yellow. </td>
<td> Price: R60 </td>
<td> Quantity: <input type="number" name="cosmosQ" value="" style="width: 50px"> </td>
<td> <input type="submit" value="Add To Cart" name="SubmitButton"> </td>
</tr>

<tr>
<td> <img src="Heliotrope.jpg" height="150" width="200"> </td>
<td> <b>Name:</b> Heliotrope </td>
<td> Height: 30cm - 75cm </td>
<td> Description: Consists of a tiny cluster, white, violet or blue blooms. Performs best when put in partial shade. </td>
<td> Price: R80 </td>
<td> Quantity: <input type="number" name="helioQ" value="" style="width: 50px"> </td>
<td> <input type="submit" value="Add To Cart" name="SubmitButton"> </td>
</tr>

<tr>
<td> <img src="Lantana.jpg" height="150" width="200"> </td>
<td> <b>Name:</b> Lantana </td>
<td> Height: 60cm - 1.8m </td>
<td> Description: Popular for an outdoor plant. Blooms in combination of yellow, orange, white, pink and red. </td>
<td> Price: R150 </td>
<td> Quantity: <input type="number" name="lantanaQ" value="" style="width: 50px"> </td>
<td> <input type="submit" value="Add To Cart" name="SubmitButton"> </td>
</tr>

</table>
</div>

</form>

	if ($_POST['TithoniaQ'] > 0) {
		$_SESSION['TithoniaQ'] = $_POST['TithoniaQ'];
		echo "<script type='text/javascript'>alert('$success');</script>";
	}

	if ($_POST['WindflowerQ'] > 0) {
		$_SESSION['WindflowerQ'] = $_POST['WindflowerQ'];
		echo "<script type='text/javascript'>alert('$success');</script>";
	}

	if ($_POST['CosmosQ'] > 0) {
		$_SESSION['CosmosQ'] = $_POST['CosmosQ'];
		echo "<script type='text/javascript'>alert('$success');</script>";
	}

	if ($_POST['HeliotropeQ'] > 0) {
		$_SESSION['HeliotropeQ'] = $_POST['HeliotropeQ'];
		echo "<script type='text/javascript'>alert('$success');</script>";
	}

	if ($_POST['LantanaQ'] > 0) {
		$_SESSION['LantanaQ'] = $_POST['LantanaQ'];
		echo "<script type='text/javascript'>alert('$success');</script>";
	}
}