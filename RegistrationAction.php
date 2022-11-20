<?php
include("../Model/head.php");
session_start();
// define variables and set to empty values
$nameErr = $emailErr = $degreeErr = $genderErr = $userErr = $passErr = $cnfrmPassErr = $dobErr = "";
$name = $email = $gender = $username = $password = $cnfrmPass = "";
$dob = $successmsg = "";
$dobdd = $dobmm = $dobyy = "";
$errCount = 0;
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $name = check_input($_POST['name']);
        $email = check_input($_POST['email']);
        $username = check_input($_POST['username']);
        $password = check_input($_POST['password']);
        $cnfrmPass = check_input($_POST['cnfrmPass']);
        $gender = check_input($_POST['gender']);
        $dob = check_input($_POST['dob']);
        $isValid = true;

//if(isset($_POST["submit"]))  {


   /* $isValid = true;
    $name = check_input($_POST['name']);
    $email = check_input($_POST['email']);
    $username = check_input($_POST['username']);
    $password = check_input($_POST['password']);
    $cnfrmPass = check_input($_POST['cnfrmPass']);
    $gender= check_input($_POST['gender']);
    $dob= check_input($_POST['dob']);*/
    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $errCount = $errCount + 1;
        $_SESSION['name_err_msg'] = "Name can not be empty";
         $isValid = false;

    } else {
        $name = check_input($_POST["name"]);
        $wcount = str_word_count($name);
        if ($wcount < 2 ) {
            // code...
            $nameErr = "Minimum 2 words required";
            $errCount = $errCount + 1;
            $_SESSION['name_err_msg'] = "Minimum 2 words required";
            $isValid = false;
        }

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]/", $name)) {
            $nameErr = "Name must start with a letter!";
            $name ="";
            $errCount = $errCount + 1;
            $_SESSION['name_err_msg'] = "Name must start with a letter.";
            $isValid = false;
        }

        if (!preg_match("/^[a-zA-Z_\-. ]*$/",$name)) {
            $nameErr = "Only letters, period and white space allowed";
            $name="";
            $errCount = $errCount + 1;
            $_SESSION['name_err_msg'] = "Only letters, period and white space allowed";
      
            $isValid = false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $errCount = $errCount + 1;
        $_SESSION['email_err_msg'] = "Email can not be empty";
      
      $isValid = false;
    } else {
        $email = check_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email="";
            $errCount = $errCount + 1;
            $_SESSION['email_err_msg'] = "Email format error";
      
      $isValid = false;
        }
    }


    if (empty($_POST["username"])) {
        $userErr = "Username is required";
        $errCount = $errCount + 1;
        $_SESSION['username_err_msg'] = "Username can not be empty";
      
      $isValid = false;
    } else {
        $username = $_POST["username"];

        if (strlen($username) <2 ) {
            // code...
            $userErr = "Minimum 2 characters required";
            $errCount = $errCount + 1;
            $_SESSION['username_err_msg'] = "Minimum 2 characters required.";
      
      $isValid = false;
        }

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z_\-.]*$/", $username)) {
            $userErr = "Username can contain alpha numeric characters, period, dash or underscore only!";
            $username ="";
            $errCount = $errCount + 1;
            $_SESSION['username_err_msg'] = "Only letters and white space is allowed";
      
      $isValid = false;
        }

    }


    if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $errCount = $errCount + 1;
        $_SESSION['password_err_msg'] = "Password can not be empty";
      
      $isValid = false;
    } else {

        $password = check_input($_POST["password"]);
        $cnfrmPass = check_input($_POST["cnfrmPass"]);

        if (empty($cnfrmPass)) {
            // code...
            $confrmPassErr = "Confirm password is required";
            $errCount = $errCount + 1;
            $_SESSION['cnfrmPass_err_msg'] = "Confirm password can not be empty";
      
      $isValid = false;
        } else {
            if ($password != $cnfrmPass) {
                // code...
                $confrmPassErr = "Confirm password is didn't match with password!";
                $errCount = $errCount + 1;
                $_SESSION['cnfrmPass_err_msg'] = "Confirm password did not match.";
      
      $isValid = false;
            }
        }


        if (strlen($password) < 8 ) {
            // code...
            $passErr = "Minimum 8 characters required";
            $errCount = $errCount + 1;
            $_SESSION['password_err_msg'] = "Minimum 8 characters required.";
      
      $isValid = false;
        }

        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[%$#@]).+$/", $password)) {
            /*
            ^ starts the string
                 (?=.*[a-z]) Atleast a lower case letter
                 (?=.*[A-Z]) Atleast an upper case letter
                 (?!.* ) no space
                 (?=.*\d%$#@) Atleast a digit and atleast one of the specified characters.
                 .{8,16} between 8 to 16 characters
            */
            $passErr .= " Password must contain atleast a digit, a lower case and an upper case letter, atleast one of the [%$#@] and no space.";
            $password ="";
            $errCount = $errCount + 1;
            $_SESSION['password_err_msg'] = "Password must contain atleast a digit, a lower case and an upper case letter, atleast one of the [%$#@] and no space.";
      
      $isValid = false;
        }

    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $errCount = $errCount + 1;
        $_SESSION['gender_err_msg'] = "Gender should be selected";
      
      $isValid = false;
    } else {
        $gender = check_input($_POST["gender"]);
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
        $errCount = $errCount + 1;
        $_SESSION['dob_err_msg'] = "DOB should be selected";
      
      $isValid = false;
    } else {
        $dob = $_POST["dob"];
    }

    if ($isValid === true) {
            $isValid = false;
            $conn = mysqli_connect("localhost", "root", "", "test", 3306);

            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }

            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, "insert into registration(name, email, username, password,  gender, dob) values (?,?,?,?,?,?)");
            mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $username, $password, $gender, $dob);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $name, $email, $username, $password, $gender, $dob);
            mysqli_stmt_fetch($stmt);

            if ($name===$name and $email === $email and $username=== $username and $password === $paword and $cnfrmPass===$cnfrmPass and $gender===$gender and $dob===$dob) {
                $isValid = true;
            }
            else {
                $_SESSION['global_msg'] = "No record(s) found. Please contact with the administrator";
                //header("Location: ../views/login_view.php");
            }
            mysqli_close($conn);                

            if ($isValid) {
                $_SESSION['name'] = $name;
                header("Location: ../view/Login.php");
            }
            else {
                $_SESSION['global_msg'] = "Write Name properly";
                header("Location: ../view/Login.php");
            }
        }
        else {
            header("Location: ../view/Login.php");
        }
    } 
    else {
        $_SESSION['global_msg'] = "Something went wrong";
        header("Location: ..//view/Login.php");
    }



    /*if($errCount > 0) {
        echo "<span class='error'>One or more error occurred!</span>";
       // header("Location: Registration.php");
    } else {
        if(file_exists('data.json'))
        {
            $current_data = file_get_contents('data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'name'               =>     $_POST['name'],
                'email'          =>     $_POST["email"],
                'username'     =>     $_POST["username"],
                'password'     =>     $_POST["password"],
                'gender'     =>     $_POST["gender"],
                'dob'     =>     $_POST["dob"],
                'ppic_abs_path'     =>     ''
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if(file_put_contents('data.json', $final_data))
            {
                echo "<span style='color: green'>Registration Successful!</span>";
                $message = "<label class='text-success'>Registration Success!</p>";
                $name='';
                $email='';
                $username = $gender = $dob = '';

            }
             $_SESSION['name_err_msg'] = "";
             $_SESSION['email_err_msg'] = "";
             $_SESSION['password_err_msg'] = "";
             $_SESSION['gender_err_msg'] = "";
             $_SESSION['dob_err_msg'] = "";
            //header("Location: Login.php");
            
        }
        else
        {
            $error = 'JSON File not exits';
        }
    }*/
function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
include("../Model/foot.php");
?>