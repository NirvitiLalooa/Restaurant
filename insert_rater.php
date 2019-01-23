<!DOCTYPE HTML>
<html>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Insert a New Rater</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body data-gr-c-s-loaded="true">
	<header id="main-header">
		<div class="container">
			<h1>Insert a New Rater</h1>
		</div>
	</header>

	<?php include"layout.php"; ?>
	<div class="container myform">
    	<div class="row">
    		<div class="col-xs-12">
    			<h3>Enter Information Below:</h3>
    			<form action="insert_rater_display.php" method="POST">
    				<div class="form-group">
    					<label for="number">User ID:</label>
    					<input type="number" class="form-control" name="id" placeholder="Enter User ID" required>
    				</div>
    				<div class="form-group">
    					<label for="email">Email:</label>
    					<input type="email" class="form-control" name="email" placeholder="Enter User Email" required>
    				</div>
    				<div class="form-group">
    					<label for="text">User Name:</label>
    					<input type="text" class="form-control" name="name" placeholder="Enter User Name" required>
    				</div>
    				<div class="form-group">
		    			<label>User Type:</label>
		    			<select class="form-control" name="type">
					     	<option value="blog">Blog</option>
					     	<option value="online">Online</option>
					     	<option value="food critic">Food Critic</option>
				    	</select>
					</div>
					<div class="form-group">
						<label>User Reputation: </label>
				   		<select class="form-control" name="reputation">
					     	<option value="1">1</option>
					     	<option value="2">2</option>
					     	<option value="3">3</option>
					     	<option value="4">4</option>
					     	<option value="5">5</option>
					    </select>
					</div>
    				<div class="form-group">
    					<input type="submit" class="btn btn-primary">
    				</div>
    			</form>
    		</div>
    	</div>
    </div>    

</body>
</html>