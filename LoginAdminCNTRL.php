<?php
$nameErr = $passErr = $l = "";
$email = $password = "";

session_start();
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$email = sanitize($_POST['email']);
		$password = sanitize($_POST['password']);
		$isValid = true;
		if (empty($email)) {
			$_SESSION['email_msg'] = "Email cannot be empty";
			$isValid = false;
		}
		if (empty($password)) {
			$_SESSION['password_msg'] = "Password cannot be empty";
			$isValid = false;
		}

		if ($isValid === true) {
			$isValid = false;
			$conn = mysqli_connect("localhost", "root", "", "test", 3306);

			if (!$conn) {
			  die("Connection failed: " . mysqli_connect_error());
			}

			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, "Select email, password From registration");
			mysqli_stmt_bind_param($stmt, "sss", $email, $password);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $email, $password);
			mysqli_stmt_fetch($stmt);

			if ($email === $email and $password === $password) {
				$isValid = true;
			}
			else {
				$_SESSION['global_msg'] = "No record(s) found. Please contact with the administrator";
				header("Location: ../view/DashBoard.php");
			}
/*if(isset ($_POST['Submit'])){
	$n = $_POST['uname'];
	$p = $_POST['pass'];
	if(empty($n)){
		$nameErr = "Please Enter Your Name";
	}
	else{
		if(strlen($n)<2){
	     		$nameErr = "User Name should contains at least two characters";
	     }
	    else{
	     	if(!preg_match("/^[a-zA-Z0-9_]+([a-zA-Z0-9_]*[.-]?[a-zA-Z0-9_]*)*[a-zA-Z0-9_]+$/", $n)){
		$nameErr =" User Name can contain alpha numeric characters, period, dash or underscore only. Please renter user name.";
	     	}
	     }
	}
	if(empty($p)){
		$passErr = "Please Enter Password";
	}
	
	else{
		if(!preg_match(	"/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $p)){
		$passErr =" Minimum eight characters, at least one letter, one number and one special character";
	     }
         else{
             $cu = $cp = "jb";
            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $un = $Info->username;
              if($un==$n){
               $cu = "";
              }
            }
            foreach ($info as $Infos) {
              $pn = $Info->password;
              if($pn==$p){
               $cp = "";
              }
            }  */          

    mysqli_close($conn);				

			if ($isValid) {
				$_SESSION['email'] = $email;
				header("Location: ../view/DashBoard.php");
			}
			else {
				$_SESSION['global_msg'] = "Email or password incorrect";
				header("Location: ../view/Login.php");
			}
		}
	
	}  /* if(empty($cu) && empty($cp)){
                session_start();
             $_SESSION['username']  = $n; 
             if(isset($_POST['remember'])){
              setcookie("username", $na, time()+86400*30);
              setcookie("password", $pa, time()+86400*30);
             }
            header("location:DashBoard.php");
             }
        else{
          $l = "Invalid User Name Or Password!";
         }*/
       

 function sanitize($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
        }

	?>
	    