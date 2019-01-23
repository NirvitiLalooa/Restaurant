<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>All the information about a restaurant</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>All the information about a restaurant</h1>
		</div>
	</header>


<?php
	include"connection.php";
	include"layout.php";
	$name="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //execute query
		$name = $_POST["name"];
		$sql = "SELECT * FROM restodb.restaurant r join restodb.location l on r.restaurantid = l.restaurantid
      WHERE r.name = '$name'";
		$result = pg_query($sql) or die('Query failed: ' . pg_last_error());

	// display result
	$i = 0;
	echo '<table class="table table-responsive table-bordered table-hover table-striped table-condensed"><tr class="archive">';
	while ($i < pg_num_fields($result))
	{
		$fieldName = pg_field_name($result, $i);
		echo '<th>' . $fieldName . '</th>';
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