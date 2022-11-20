<?php

// define variables and set to empty values
$nameErr = $emailErr = $degreeErr = $genderErr = $userErr = $passErr = $cpassErr = $dobErr = "";
$name = $email = $gender = $username = $password = $cnfrmPass = "";
$dob = $successmsg = "";
$dobdd = $dobmm = $dobyy = "";
$errCount = 0;
$message = '';
$error = '';
?>
<?php include("../Model/head.php");?>
 


<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <h3 align="">Register a New Account</h3><br />
    
    <form method="post" action="RegistrationAction.php" enctype="multipart/form-data" novalidate> 

        <?php
        if(isset($error))
        {
            echo $error;
        }
        ?>
        <br />
        <fieldset>
        <legend> <h3 class="main-heading">REGISTRATION</h3> </legend>
        <label for="name">Name  : </label><br><span><?php echo $nameErr;?></span>
        <input type="text" name="name"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="email">Email  : </label><span><?php echo $emailErr;?></span><br>
        <input type="text" name="email"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="username">User Name  : </label><span><?php echo $userErr;?></span><br>
        <input type="text" name="username"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="pass">Password  : </label><br><span><?php echo $passErr;?></span>
        <input type="password" name="password"><br>
        <span class="underline">________________________________</span><br><br> 
        <label for="cnfrmPass">Conform Password  : </label><br><span><?php echo $cpassErr;?></span><br>
        <input type="password" name="cnfrmPass"><br>
        <span class="underline">________________________________</span><br><br>

        <fieldset>
            <legend>Gender</legend>  <span class="error">* <?php echo $genderErr;?></span>
            <input type="radio" id="male" name="gender" value="male" <?php if ($gender === 'male'){ echo 'checked';}?> >
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" <?php if ($gender === 'female'){ echo 'checked';}?> >
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other" <?php if ($gender === 'other'){ echo 'checked';}?> >
            <label for="other">Other</label><br>

            <legend>Date of Birth:</legend>  <span class="error">* <?php echo $dobErr;?></span>
            <input type="date" name="dob" value="<?php echo $dob;?>"> <br><br>
        </fieldset>

        <input type="submit" name="submit" value="Register" class="btn btn-info" /><br />
        <?php
        if(isset($message))
        {
            echo $message;
        }
        ?>
        <ul>
    <li ><a href='AdminView.php' style= "color:red;"> Back </a></li>
</ul>
    </form>
</div>
<br />
</div>
</body>
<?php include("../Model/foot.php");?>
</html>

