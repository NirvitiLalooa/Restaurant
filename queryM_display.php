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
	include"connection.php";
	include"layout.php";	
	$name='';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name=$_POST["name"];
	//execute query
		
	//  --  frequently = often, often = many times 
	//	-- we assumed that "raters that rated a specific restaurant the most frequently" means the user that rated that restaurant the most amount of times 
	//	-- ex: if user1 rated the restaurant 6 times and user2 rated it 3 times, then the query will return user1

	$sql="CREATE TEMPORARY TABLE ratings_per_user (num_rates int, userid int);
 
	INSERT INTO ratings_per_user select count(ratingItem.date) as num_rates, ratingItem.userID as userid 
	from restodb.ratingItem, restodb.menuItem, restodb.restaurant
	where ratingItem.itemid = menuItem.itemid and menuItem.restaurantid = restaurant.restaurantid
     	      and restaurant.name = '$name'
     		group by ratingItem.userid;
	SELECT rater.name, rater.reputation, ratingItem.comment, menuItem.name, menuItem.price
           from restodb.rater, restodb.restaurant, restodb.ratingItem, restodb.menuItem
           where ratingItem.userid = rater.userid and ratingItem.itemid = menuItem.itemid and   menuItem.restaurantId =     restaurant.restaurantid
     and menuItem.restaurantid = (select restaurantid from restodb.restaurant where name = '$name' )
     and rater.userid in (select userid from ratings_per_user where num_rates = (select max(num_rates) from ratings_per_user));";
 

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

	$sql = "DROP TABLE ratings_per_user";
	$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
	}
	?>
	</body>
	</html>
	