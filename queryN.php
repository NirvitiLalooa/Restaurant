<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Names and emails of all raters who gave ratings that are lower than that of a rater with a name called John, in terms of the combined rating of Price, Food, Mood and Staff</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Names and emails of all raters who gave ratings that are lower than that of a rater with a name called John, in terms of the combined rating of Price, Food, Mood and Staff</h1>
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

	$sql="CREATE temporary table johns_ratings(userid int, combined_rating int);
insert into johns_ratings
  (select rating.userid, (rating.food + rating.mood + rating.price + rating.staff)
   from restodb.rating join restodb.rater on (rating.userid = rater.userid)
   where rating.userid in (select userid from restodb.rater where name = 'John'));

select rater.name, rater.email, johns_ratings.userid as johns_id
 from
  restodb.rater join restodb.rating on (rater.userid = rating.userid),
  johns_ratings
 where (rating.food + rating.mood + rating.price + rating.staff) < johns_ratings.combined_rating
 group by johns_id, rater.name, rater.email ;
";
 

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

	$sql = "DROP TABLE johns_ratings";
	$result = pg_query($sql) or die('Query failed: ' . pg_last_error());
	?>

</body>
</html>