<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>The details of a type of restaurant that obtained the highest Food rating along with name of raters who gave these ratings </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>The details of a type of restaurant that obtained the highest Food rating along with name of raters who gave these ratings</h1>
		</div>
	</header>

<?php
	include"connection.php";
	include"layout.php";
	$type='';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	//execute query
		$type=$_POST["type"];
		$sql = "SELECT resto.name AS Restaurant_name, rater.name AS Rater_name
				FROM restodb.restaurant AS resto, restodb.rater AS rater, restodb.rating AS rating
				WHERE rating.userid = rater.userid AND rating.restaurantid = resto.restaurantid AND resto.type = '$type'AND rating.food = 5
				ORDER BY resto.name";

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