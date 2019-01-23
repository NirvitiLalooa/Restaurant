	<!DOCTYPE HTML>
	<html>
	 <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <title>Delete a Menu Item</title>
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<body data-gr-c-s-loaded="true">
		<header id="main-header">
			<div class="container">
				<h1>Delete a Menu Item</h1>
			</div>
		</header>

		
	<?php
	// define variables and set to empty values
	include"connection.php";
	include"layout.php";
	$query = "SELECT name FROM restodb.menuitem";
	$res = pg_query($query) or die('Query failed: ' . pg_last_error());


	// create dropdown menu for user to choose restaurant
	echo '<div class="container myform"><div class="row"><div class="col-xs-12">';
	echo '<h3>Select Information Below:</h3>';
	echo '<form action="delete_menuitem_display.php" method="POST">';
	echo '<div class="form-group">';
	echo "<label>Select menu item name to delete: </label>";
	echo '<select class="form-control" name="name" id="restoName">';
	while($row = pg_fetch_array($res)){
		$c_row = current($row);
		echo '<option value="'.$c_row.'">'.$c_row.'</option>';
	}

	echo "</select></div></div></div>";
	echo '<input type="submit" class="btn btn-primary">';
	echo "</form>";



	?>
	<script>
	$(document).ready(function(){
		$('#restoName').change(function(){
			var
		})
	})
	</script>
		
	
</body>
</html>