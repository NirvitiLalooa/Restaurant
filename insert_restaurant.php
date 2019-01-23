<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert a New Restaurant</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <body data-gr-c-s-loaded="true">
  <header id="main-header">
    <div class="container">
      <h1>Insert a New Restaurant</h1>
    </div>
  </header>

<?php include"layout.php"; ?>
    <div class="container myform">
    	<div class="row">
    		<div class="col-xs-12">
    			<h3>Enter Information Below:</h3>
    			<form action="insert_restaurant_display.php" method="POST">
    				<div class="form-group">
    					<label for="number">Restaurant ID:</label>
    					<input type="number" class="form-control" name="id" placeholder="Enter Restaurant ID" required>
    				</div>
    				<div class="form-group">
    					<label for="text">Restaurant Name:</label>
    					<input type="text" class="form-control" name="name" placeholder="Enter Restaurant Name" required>
    				</div>
    				<div class="form-group">
    					<label for="text">Restaurant Type:</label>
    					<input type="text" class="form-control" name="type" placeholder="Enter Restaurant Type" required>
    				</div>
    				<div class="form-group">
    					<label for="text">Restaurant URL:</label>
    					<input type="text" class="form-control" name="url" placeholder="Enter Restaurant URL" required>
    				</div>
    					<input type="submit" class="btn btn-primary">
    			</form>
    		</div>
    	</div>
    </div>

	
</body>
</html>