<?php
include "../Controller/LoginAdminCNTRL.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

</head>
<body>

    <div class="full-page">
        <div class="sub-page">
<?php
include('../Model/head.php');
?>
  
            </div>


                <div class="row">
                <div class="col-1">
                    <div class="form-box">
                        <div class="form">
                           
    <form class="login-form" method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend> <h3 class="main-heading">Login</h3> </legend>
        <label><span style="color: red"><?php echo $l ?></span></label><br><br>
        <label for="email"> <b>Email :</b> </label>
        <input type="text" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email']; } ?>"><span style="color: red">*<br><?php echo $nameErr?><br></span><br>
        <label for="password"> <b>password :</b> </label>
        <input type="password" name="password"value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>"><span style="color: red">*<br><?php echo $passErr?><br></span><br>    
        <span class="underline">____________________________________________________________________</span><br><br>
        
        <input type="checkbox" name="remember" value =1 > <label for="remember"> Remember me</label><br>   
        <input type="submit" name="Submit" value="Submit">
        <a href="forgot.php">Forgot passwordword?</a><br><br>
        <a href="Registration.php">Create New Account.</a>
    </fieldset>
    </form> 
    </div>
 </div>
 </div>
</div>
<?php
include('../Model/foot.php');
?>
  
</body>
</html>
