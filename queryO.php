<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Names, types and emails of the raters that provide the most diverse ratings along with the restaurants names and the ratings</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Names, types and emails of the raters that provide the most diverse ratings along with the restaurants names and the ratings</h1>
		</div>
	</header>
	
	<?php
	// define variables and set to empty values
	include"connection.php";
	include"layout.php";
	//execute query
		
	//  --  frequently = often, often = many times 
	//	-- we assumed that "raters that rated a specific restaurant the most frequently" means the user that rated that restaurant the most amount of times 
	//	-- ex: if user1 rated the restaurant 6 times and user2 rated it 3 times, then the query will return user1

	$sql="SELECT distinct rater.name, rater.type, rater.email
             from restodb.rater join restodb.rating on rater.userid = rating.userid
             where
           ( select exists (select rating.comments from restodb.rating as rating2 where rating.userid = rating2.userid and           rating.restaurantid = rating2.restaurantid
                   and rating.date <> rating2.date and (rating.date - rating2.date) < 37
                   and ((rating.food - rating2.food) = 4 or (rating.food - rating2.food) = 3) ))";
 

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