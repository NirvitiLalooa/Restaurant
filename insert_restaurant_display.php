<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Display Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Display Data</h1>
		</div>
	</header>


<?php
	// define variables and set to empty values
	include"connection.php";
	 include"layout.php";


	$id = $name = $type = $url = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = $_POST["id"];
		$name = $_POST["name"];
		$type = $_POST["type"];
		$url = $_POST["url"];
		$sql = "INSERT INTO restodb.restaurant (restaurantid, name, type, url) VALUES ('$id', '$name', '$type', '$url')";
		$res = pg_query($sql) or die('Query failed: ' . pg_last_error());

		
		$query = 'SELECT * from restodb.restaurant';

	$result = pg_query($query);

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