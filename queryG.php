<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The details of the restaurants that have not been rated in January 2015</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>The details of the restaurants that have not been rated in January 2015</h1>
		</div>
	</header>

	<?php
	// define variables and set to empty values
	include"connection.php";
	include"layout.php";

	//execute query
	$sql = "SELECT DISTINCT r.restaurantID, r.Name, r.Type FROM restodb.RESTAURANT r, restodb.RATER re, restodb.RATING r8
		WHERE r.restaurantID NOT IN
		(SELECT DISTINCT r.restaurantID FROM restodb.RESTAURANT r, restodb.RATER re, restodb.RATING r8
		WHERE r8.restaurantID = r.restaurantID AND re.userID = r8.userID AND (r8.date between '2015-01-01' AND '2015-01-31'))
		ORDER BY r.restaurantID";

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