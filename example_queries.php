<!DOCTYPE HTML>
<html>

<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Example Queries</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


	<body data-gr-c-s-loaded="true">
		<header id="main-header">
			<div class="container">
				<h1>Example Queries</h1>
			</div>
		</header>

		<!-- navbar from bootstrap -->
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	      <a class="navbar-brand" href="#">Welcome!</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarsExample04">
	        <ul class="navbar-nav mr-auto">
	          <li class="nav-item active">
	            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
	          </li>
	          <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add New Data</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown04">
	              <a class="dropdown-item" href="insert_restaurant.php">Add a New Restaurant</a>
	              <a class="dropdown-item" href="insert_rater.php">Add a New Rater</a>
	              <a class="dropdown-item" href="insert_menuitem.php">Add a New Menu Item</a>
	            </div>
	          </li>
	           <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Delete Data</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown04">
	              <a class="dropdown-item" href="delete_restaurant.php">Delete a Restaurant</a>
	              <a class="dropdown-item" href="delete_rater.php">Delete a Rater</a>
	              <a class="dropdown-item" href="delete_menuitem.php">Delete a Menu Item</a> 	
	            </div>
	          </li>
	          <li class="nav-item dropdown">
	            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Display Data</a>
	            <div class="dropdown-menu" aria-labelledby="dropdown04">
	              <a class="dropdown-item" href="display_restaurant.php">Restaurant</a>
	              <a class="dropdown-item" href="display_location.php">Restaurant Locations</a>
	              <a class="dropdown-item" href="display_rater.php">Rater</a>
	              <a class="dropdown-item" href="display_menuitem.php">Menu Item</a> 	
	              <a class="dropdown-item" href="display_rating.php">Rating</a>
	              <a class="dropdown-item" href="display_menurating.php">Menu Rating</a>	
	            </div>
	        </li>
	          <li class="nav-item active">
	            <a class="nav-link" href="example_queries.php">Example Queries </a>
	          </li>
	        </ul>
	      </div>
	    </nav>

	    <div class="container marg">
    		<div class="row">
    			<div class="col-xs-12">
    				<h1 class="display3">Here are some example queries you can try:</h1>
    				<hr>
    				<ul class="list-group">
	    				<li class="list-group-item"><p class="lead"> <a href="queryA.php"> Display all the information about a user‐specified restaurant. That is, the user should select the name of the restaurant from a list, and the information as contained in the restaurant and location tables should then displayed on the screen.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryB.php"> Display the full menu of a specific restaurant. That is, the user should select the name of the restaurant from a list, and all menu items, together with their prices, should be displayed on the screen. The menu should be displayed based on menu item categories.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryC.php"> For each user‐specified category of restaurant, list the manager names together with the date that the locations have opened. The user should be able to select the category (e.g. Italian or Thai) from a list.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryD.php"> Given a user‐specified restaurant, find the name of the most expensive menu item. List this information together with the name of manager, the opening hours, and the URL of the restaurant. The user should be able to select the restaurant name (e.g. El Camino) from a list.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryE.php"> For each type of restaurant (e.g. Indian or Irish) and the category of menu item (appetiser, main or desert), list the average prices of menu items for each category</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryF.php"> Find the total number of rating for each restaurant, for each rater. That is, the data should be grouped by the restaurant, the specific raters and the numeric ratings they have received.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryG.php"> Display the details of the restaurants that have not been rated in January 2015. That is, you should display the name of the restaurant together with the phone number and the type of food.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryH.php"> Find the names and opening dates of the restaurants that obtained Staff rating that is lower than any rating given by rater X. Order your results by the dates of the ratings. (Here, X refers to any rater of your choice.)</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryI.php"> List the details of the Type Y restaurants that obtained the highest Food rating. Display the restaurant name together with the name(s) of the rater(s) who gave these ratings. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.)</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryJ.php"> Provide a query to determine whether Type Y restaurants are "more popular" than other restaurants. (Here, Type Y refers to any restaurant type of your choice, e.g. Indian or Burger.) </a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryK.php"> Find the names, join‐date and reputations of the raters that give the highest overall rating, in terms of the Food and the Mood of restaurants. Display this information together with the names of the restaurant and the dates the ratings were done.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryL.php"> Find the names and reputations of the raters that give the highest overall rating, in terms of the Food or the Mood of restaurants. Display this information together with the names of the restaurant and the dates the ratings were done.</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryM.php"> Find the names and reputations of the raters that rated a specific restaurant (say Restaurant Z) the most frequently. Display this information together with their comments and the names and prices of the menu items they discuss. (Here Restaurant Z refers to a restaurant of your own choice, e.g. Ma Cuisine).</a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryN.php"> Find the names and emails of all raters who gave ratings that are lower than that of a rater with a name called John, in terms of the combined rating of Price, Food, Mood and Staff. (Note that there may be more than one rater with this name). </a> </p></li>
	    				<li class="list-group-item"><p class="lead"> <a href="queryO.php"> Find the names, types and emails of the raters that provide the most diverse ratings. Display this information together with the restaurants names and the ratings. For example, Jane Doe may have rated the Food at the Imperial Palace restaurant as a 1 on 1 January 2015, as a 5 on 15 January 2015, and a 3 on 4 February 2015. Clearly, she changes her mind quite often.</a> </p></li>

    			</div>
    		</div>
    	</div>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    </html>
