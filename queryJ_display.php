<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Popularity of a restaurant out of 10</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Popularity of a restaurant out of 10</h1>
		</div>
	</header>

<?php
	include"connection.php";
	include"layout.php";
	$type='';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$type=$_POST["type"];
	//execute query
		
	//  -- Our interpretation: we can determine the popularity of a type of restaurant by determining its average (food + price) rating, and comparing it to the average (food + price) rating of other types of restaurants.  We chose to base the popularity on food and price because generally if a restaurant has a good price and has good food, it will be more popular. 

	$sql = "SELECT restaurant.type AS Restaurant_type, ROUND(AVG(rating.food + rating.price),1) AS popularity_rating
     FROM restodb.rating JOIN restodb.restaurant ON rating.restaurantid = restaurant.restaurantid
     WHERE restaurant.type = '$type'
     GROUP BY restaurant.type
     ORDER BY popularity_rating DESC";

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
	}
	?>
</body>
</html>