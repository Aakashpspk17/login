<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">	
<h1 class="center">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSignup</h1>
<form name="registration" action="" method="post">
<input style="text-align:center" type="text" name="username" placeholder="Username" required /><br><br>
<input style="text-align:center" type="email" name="email" placeholder="Email" required /><br><br>
<input style="text-align:center" type="password" name="password" placeholder="Password" required /><br><br><br>
<input style="text-align:center" type="submit" name="submit" value="Register" />
<input style="text-align:center; background-color:#FF0000" type="submit" name="submit" value="Sign in" />

</form>
</div>
<?php } ?>
</body>
</html>
