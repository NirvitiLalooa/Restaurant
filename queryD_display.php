<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Name of the most expensive menu item of a restaurant at a location</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Name of the most expensive menu item of a restaurant at a location</h1>
		</div>
	</header>

	
<?php
	include"connection.php";
	include"layout.php";
	$name="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //execute query
		$name = $_POST["name"];
		$sql = "SELECT  m.name, l.manager_name, l.week_open, l.weekend_open, r.url FROM restodb.RESTAURANT r, restodb.MENUITEM m, restodb.LOCATION l WHERE r.name = '$name' AND r.restaurantID = m.restaurantID AND m.price = (SELECT MAX(price) FROM restodb.RESTAURANT r, restodb.MENUITEM m WHERE r.name = '$name' AND r.restaurantID = m.restaurantID) AND m.restaurantID = l.restaurantID";
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