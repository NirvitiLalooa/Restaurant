<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Names and reputations of the raters that rated a specific restaurant the most frequently along with their comments and the names and prices of the menu items they discuss</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">

<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Names and reputations of the raters that rated a specific restaurant the most frequently along with their comments and the names and prices of the menu items they discuss</h1>
		</div>
	</header>
	
	<?php
	// define variables and set to empty values
	include"connection.php";
	include"layout.php";
	$query = "SELECT name FROM restodb.restaurant";
	$res = pg_query($query) or die('Query failed: ' . pg_last_error());


	// create dropdown menu for user to choose restaurant
	echo '<div class="container myform"><div class="row"><div class="col-xs-12">';
	echo '<h3>Select Information Below:</h3>';
	echo '<form action="queryM_display.php" method="POST">';
	echo '<div class="form-group">';
	echo "<label>Select restaurant name to display information: </label>";
	echo '<select class="form-control" name="name">';
	while($row = pg_fetch_array($res)){
		$c_row = current($row);
		echo '<option value="'.$c_row.'">'.$c_row.'</option>';
	}

	echo "</select></div></div></div>";
	echo '<input type="submit">';
	echo "</form>";

	
	?>

</body>
</html>