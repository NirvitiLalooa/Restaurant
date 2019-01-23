<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert a New Menu Item</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <body data-gr-c-s-loaded="true">
  <header id="main-header">
    <div class="container">
      <h1>Insert a New Menu Item</h1>
    </div>
  </header>

<?php include"layout.php"; ?>

    <div class="container myform">
    	<div class="row">
    		<div class="col-xs-12">
    			<h3>Enter Information Below:</h3>
    			<form action="insert_menuitem_display.php" method="POST">
    				<div class="form-group">
    					<label for="number">Item ID:</label>
    					<input type="number" class="form-control" name="id" placeholder="Enter Item ID" required>
    				</div>
    				<div class="form-group">
    					<label for="text">Item Name:</label>
    					<input type="text" class="form-control" name="name" placeholder="Enter Item Name" required>
    				</div>
    				<div class="form-group">
    					<label for="text">Item Type:</label>
    					<select class="form-control"name="type">
					    	<option value="food">Food</option>
					    	<option value="beverage">Beverage</option>
	    				</select>
    				</div>
    				<div class="form-group">
						<label>Item Category:</label>
						<select class="form-control" name="category">
							<option value="starter">Starter</option>
							<option value="main">Main</option>
							<option value="dessert">Dessert</option>
						</select>
					</div>
    				<div class="form-group">
    					<label for="text">Restaurant URL:</label>
    					<input type="text" class="form-control" name="url" placeholder="Enter Restaurant URL" required>
    				</div>
    				<div class="form-group">
				   		<label>Item Description: </label>
				    	<input type="text" class="form-control" name="description" placeholder="Enter Item Description" required>
				    </div>
				    <div class="form-group">
				    	<label>Item Price: </label>
				    	<input type="number" class="form-control" name="price" placeholder="Enter Price" required>
				    </div>
				    <div class="form-group">
				    	<label>Restaurant ID: </label>
				    	<input type="number" class="form-control" name="restoid" placeholder="Enter Restaurant ID" required>
				    </div>
    					<input type="submit" class="btn btn-primary">
    			</form>
    		</div>
    	</div>
    </div>


</body>
</html>