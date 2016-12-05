<?php
include ('scripts/dbconnect.php');

if(isset($_POST['btn-login']))
   {
      $email = $Connect->real_escape_string(trim($_POST['user_email']));
      $upass = $Connect->real_escape_string(trim($_POST['password']));
      
      $query = $Connect->query("SELECT user_id, user_email, user_pass FROM users WHERE user_email='$email'");
      $row=$query->fetch_array();
      
      if(password_verify($upass, $row['user_pass']))
      {
         $_SESSION['userSession'] = $row['user_id'];
         header("Location: .");
      }
      else
      {
         $msg = "<div class='alert alert-danger'>
                  <span class='glyphicon glyphicon-info-sign'></span> &nbsp; email or password does not exists !
               </div>";
      }
      
      $Connect->close();
      
   }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/frameworks-670aaf67517f485d1cc3d32a9303f11b30559d2d8b6bf839bf0199b83ad50468.css" integrity="sha256-ZwqvZ1F/SF0cw9MqkwPxGzBVnS2La/g5vwGZuDrVBGg=" media="all" rel="stylesheet" />
      <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-2d1b79a5296eab9613c29bbac983651835f5ea62fb87eb9b860b7240dd28d934.css" integrity="sha256-LRt5pSluq5YTwpu6yYNlGDX16mL7h+ubhgtyQN0o2TQ=" media="all" rel="stylesheet" />
      <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/site-4a18dc1c93cc7113ea22c7c6b62826f621b52a57f32caea97c682100ac10de36.css" integrity="sha256-ShjcHJPMcRPqIsfGtigm9iG1KlfzLK6pfGghAKwQ3jY=" media="all" rel="stylesheet" />
      <title>Not-Facebook - Login</title>
      <link rel="assets" href="https://assets-cdn.github.com/">
      <link rel="mask-icon" href="assets/img/logo.jpg">
      <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg">
   </head>
   <body class="logged-out  env-production windows  session-authentication page-responsive min-width-0">
      <div id="js-pjax-loader-bar" class="pjax-loader-bar">
         <div class="progress"></div>
      </div>
      <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>
      <div class="header header-logged-out width-full pt-5 pb-4" role="banner">
         <div class="container clearfix width-full">
         	<img src="assets/img/logo.jpg" class="header-logo" width="75em" style="margin-left: 47%;padding:0;">
         </div>
      </div>
      <div id="start-of-content" class="accessibility-aid"></div>
      <div role="main">
         <div id="js-pjax-container" data-pjax-container>
            <div class="auth-form px-3" id="login">
               <!-- '"` --><!-- </textarea></xmp> --></option></form>
               <form accept-charset="UTF-8" action="" method="post">
                  <div style="margin:0;padding:0;display:inline">
                  <div class="auth-form-header p-0">
                     <h1>Sign in to Not-Facebook</h1>
                  </div>
                  <div id="js-flash-container"></div>
                  <div class="auth-form-body mt-3">
                     <?php
                     if(isset($msg)):
                        echo $msg;
                     endif;
                     ?>   
                     <label for="login_field">
                     Email Address
                     </label>
                     <input autocapitalize="off" autocorrect="off" autofocus="autofocus" class="form-control input-block" id="user_email" name="user_email" tabindex="1" type="email" />
                     <label for="password">
                     Password <a href="/password_reset" class="label-link">Forgot password?</a>
                     </label>
                     <input class="form-control form-control input-block" id="password" name="password" tabindex="2" type="password" />
                     <input class="btn btn-primary btn-block" data-disable-with="Signing in…" name="btn-login" tabindex="3" type="submit" value="Sign in" />
                  </div>
               </form>
               <p class="create-account-callout mt-3">
                  New to Not-Facebook?
                  <a href="register">Create an account</a>.
               </p>
            </div>
         </div>
      </div>
   </body>
</html>