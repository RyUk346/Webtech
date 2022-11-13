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
	<a href='history' >3.History</a>
	

<form method = "post" action="converionAction.php" enctype="application/x-www-form-urlencoded" novalidate>
    

    <h2> Converter:</h2>
	<label for = "category">Select Category:</label><br>
	<input type="d" name="fname" id="fname" > <br><br>
	<?php echo isset($_SESSION['first_name_msg']) ? $_SESSION['first_name_msg'] : ""; ?><br><br>
		
	
	<label for = "value">Value:</label><br>
	<input type="text" name="value" id="value"> 
	
	<input type="submit" name= "submit" value="Submit"><br><br>
	
	<label for = "result">Result:</label><br>
	<input type="text" name="result" id="result"> <br><br>
	
	

</form>	

</body>
</html>