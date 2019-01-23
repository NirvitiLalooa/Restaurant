<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Total number of rating for each restaurant, for each rater</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Total number of rating for each restaurant, for each rater</h1>
		</div>
	</header>
	
	<?php
	// define variables and set to empty values
	include"connection.php";
	include"layout.php";

	//execute query
	$sql = "SELECT r.name as rater_name, re.Name as restaurant_name, COUNT(r8.userID) as num_of_ratings FROM restodb.RESTAURANT re, restodb.RATER r, restodb.RATING r8
			WHERE re.restaurantID = r8.restaurantID AND r.userID = r8.userID
	  		GROUP BY re.Name, r.name
	  		ORDER BY r.name";
	$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

	// display result
	$i = 0;
	echo '<table class="table table-bordered table-hover table-striped table-condensed"><tr class="archive">';
	while ($i < pg_num_fields($result))
	{
		$fieldName = pg_field_name($result, $i);
		echo '<td>' . $fieldName . '</td>';
		$i = $i + 1;
	}
	echo '</tr>';
	$i = 0;

	while ($row = pg_fetch_row($result)) 
	{
		echo '<tr>';
		$count = count($row);
		$y = 0;
		while ($y < $count)
		{
			$c_row = current($row);
			echo '<td>' . $c_row . '</td>';
			next($row);
			$y = $y + 1;
		}
		echo '</tr>';
		$i = $i + 1;
	}
	pg_free_result($result);

	echo '</table>';
	?>
</body>
</html>