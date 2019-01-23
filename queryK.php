<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Names, join‐date and reputations of the raters that give the highest overall rating, in terms of the Food and the Mood of restaurants along with the names of the restaurant and the dates the ratings were done</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Names, join‐date and reputations of the raters that give the highest overall rating, in terms of the Food and the Mood of restaurants along with the names of the restaurant and the dates the ratings were done</h1>
		</div>
	</header>
	
	<?php
	// define variables and set to empty values
	include"connection.php";
	include"layout.php";

	//execute query
	$sql = "SELECT rater.name AS rater_name, rater.join_date AS rater_join_date, rater.reputation AS rater_reputation, resto.name AS restaurant_name, rating.date AS rating_date
   		FROM restodb.rater AS rater, restodb.restaurant AS resto, restodb.rating AS rating
   		WHERE rater.userid = rating.userid AND rating.restaurantid = resto.restaurantid AND (rating.food + rating.mood) = (SELECT MAX(food + mood) FROM restodb.rating WHERE restaurantid = resto.restaurantid)
   		ORDER BY resto.name, rating_date";

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