<?php
session_start();
include 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
    header("Location: .");
}

if(isset($_POST['btn-login']))
{
    $email = mysql_real_escape_string($_POST['email']);
    $upass = mysql_real_escape_string($_POST['pass']);
    
    $email = trim($email);
    $upass = trim($upass);
    
    $res=mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
    $row=mysql_fetch_array($res);
    
    $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
    
    if($count == 1 && $row['user_pass']==md5($upass))
    {
        $_SESSION['user'] = $row['user_id'];
        header("Location: .");
    }
    else
    {
        ?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
    }
    
}
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>OnlineShop</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
	<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>

	<div class="signin-form">

		<div class="container">
	     
	        
	       <form class="form-signin" method="post" id="login-form">
	      
	        <h2 class="form-signin-heading">Sign In.</h2><hr />
	        
	        <?php
			if(isset($msg)){
				echo $msg;
			}
			?>
	        
	        <div class="form-group">
	        <input type="email" class="form-control" placeholder="Email address" name="user_email" required />
	        <span id="check-e"></span>
	        </div>
	        
	        <div class="form-group">
	        <input type="password" class="form-control" placeholder="Password" name="password" required />
	        </div>
	       
	     	<hr />
	        
	        <div class="form-group">
	            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
	    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
				</button> 
	            
	            <a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a>
	            
	        </div>  
	        
	        
	      
	      </form>

	    </div>
	    
	</div>

	</body>
	</html>