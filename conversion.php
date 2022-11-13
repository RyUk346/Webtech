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

<ul>
	<li ><a href='home.php' style= "color:red;">1.Home </a></li>
	<li ><a href='' style= "color:red;">Dashboard </a></li>

<form method = "post" action="converionAction.php" enctype="application/x-www-form-urlencoded" novalidate>
    

    <h2> Converter:</h2>
	<label for = "category">Select Category:</label><br>
	<input type="d" name="fname" id="fname" > <br><br>
	<?php echo isset($_SESSION['first_name_msg']) ? $_SESSION['first_name_msg'] : ""; ?><br><br>
		
	
	<label for = "lname">Last Name:</label><br>
	<input type="text" name="lname" id="lname"> <br><br>
	<?php echo isset($_SESSION['last_name_msg']) ? $_SESSION['last_name_msg'] : ""; ?><br><br>

	
	
	<label for = "gender">Choose Gender:</label><br>
	<input type="radio" name="gender"   value="female"> Female 
	<input type="radio" name="gender"   value="male"> Male 
	<br><br>
	<?php echo isset($_SESSION['gender_msg']) ? $_SESSION['gender_msg'] : ""; ?><br><br>

	
	
	
	<label for="email">Email:</label><br>
	<input type="email" name="email" id="email"> <br><br>
	<?php echo isset($_SESSION['email_msg']) ? $_SESSION['email_msg'] : ""; ?><br><br>

	

	<label for="password">Password:</label><br>
	<input type="password" name="password" id="password" required><br><br>
	<?php echo isset($_SESSION['password_msg']) ? $_SESSION['password_msg'] : ""; ?><br><br>

	
	
	<label for = "cpassword">Confirm Password:</label><br>
	<input type="password" name="cpassword" id = "cpassword" required> <br><br>
	<?php echo isset($_SESSION['cpassword_msg']) ? $_SESSION['cpassword_msg'] : ""; ?><br><br>

	
	
	
	<input type="submit" name= "submit" value="Register">

	
	

</form>	

</body>
</html>