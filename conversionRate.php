<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	
<label> <h1>Page 1[Home]</h1> </label><br>
<label> <h2>Conversion Site</h2> </label><br>

	<a href='home.php'>1.Home </a>
	<a href='conversionRate.php' >2.Conversion Rate </a>
	<a href='history.php' >3.History</a>
	

<form method = "post" action="conversionAction.php" enctype="application/x-www-form-urlencoded" novalidate>
    

    <h2> Convertion rate:</h2>
	<label for = "category">Category:</label><br>
	<input type="text" name="category" id="category" > <br><br>
	
	<label for = "unit">Unit:</label><br>
	<input type="text" name="unit id="unit"> <br><br>
		
	
	<label for = "rate">Rate:</label>
	<input type="text" name="rate" id="rate"> 
	
	<input type="submit" name= "submit" value="Submit"><br><br>
	
	
	

</form>	

</body>
</html>