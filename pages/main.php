<?php
include ('scripts/dbconnect.php');
include ('scripts/format.php');

include ('scripts/Twit-Func.php');

$UserSession = $_SESSION['userSession'];
GetUserInfo($UserSession);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Not-Facebook</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato|Rubik" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/post-css.css">
<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">
</head>
<body>

<nav>
    <div class="nav-wrapper light-blue darken-2">
      <a href="" class="brand-logo">Not-Facebook</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <!-- Dropdown Structure -->
	  <ul id="dropdown" class="dropdown-content">
		  <li><a href="#!">one</a></li>
		  <li><a href="#!">two</a></li>
		  <li class="divider"></li>
		  <li><a href="#!">three</a></li>
	  </ul>
	  <!-- Dropdown Structure -->
	  <ul id="dropdown1" class="dropdown-content">
		  <li><a href="#!">one</a></li>
		  <li><a href="#!">two</a></li>
		  <li class="divider"></li>
		  <li><a href="#!">three</a></li>
	  </ul>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <!-- Dropdown Trigger -->
      	<li><a class="dropdown-button" data-activates="dropdown"><?= $Username ?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <!-- Dropdown Trigger -->
      	<li><a class="dropdown-button" data-activates="dropdown1"><?= $Username ?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>

<div class="container-fluid">
	<div class="row">
		<div class="col s12 m6 l3">
			<div class="dashboard-panel">
				<div class="dashboard-panel-body">
					<img class="user-picture" src="uploads/images/<?= $UserPicture ?>">
					<a href="user/<?= $Username ?>" class="user-name"><?= $Username ?></a>
				</div>
			</div>
			<div class="dashboard-panel">
				<div class="user-stats">
					<a href="user/<?= $Username ?>" class="collection-item">
						<span class="badge"><?= $UserPosts ?></span>Posts 
					</a><br>
					<a href="user/<?= $Username ?>/followers" class="collection-item">
						<span class="badge"><?= $UserFollowers ?></span>Followers 
					</a><br>
					<a href="user/<?= $Username ?>/following" class="collection-item">
						<span class="badge"><?= $UserFollowing ?></span>Following 
					</a>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l3 trending-1">
			<div class="dashboard-panel">
				<div class="dashboard-panel-body">
				trending
				</div>
			</div>
		</div>
		<div class="col s12 m12 l6">
			<div class="new-post-panel">
				<div class="form-box">
					<form action="#" method="post" id="new-post-form">
						<div class="new-post-panel-header">
							<span><img class="new-post-picture" src="uploads/images/<?= $UserPicture ?>"></span>
							<a onclick="ClearText()" type="button" class="waves-effect btn-flat">Clear Text</a>
						</div>
						<textarea class="post-textarea" id="textarea" name="textarea" maxlength="240" placeholder="Write your post here"></textarea>
						<div class="new-post-panel-footer">
							<button class="waves-effect light-blue darken-2 btn">
								<input type="submit" id="post" name="submit-post" value="Post">
							</button>
							<span class="textcount" id="textarea-counter">240 Characters Remaining</span>
						</div>
					</form>
				</div>
			</div>
			<div id="posts"></div>
		</div>
		<div class="col s12 m6 l3 trending-2">
			<div class="dashboard-panel">
				<div class="dashboard-panel-body">
				trending
				</div>
			</div>
		</div>
			<!--
			<div class="dashboard-panel">
				<div class="dashboard-panel-header"><span class="noti-header">Notifications</span></div>
				<div class="dashboard-panel-body" style="padding:0">
				<?php
				$GrabNotifications = $Connect -> query("SELECT * FROM notifications WHERE user_id2 = '$UserID'");
				while($Notification = $GrabNotifications -> fetch_array()):
				?>
				<div class="notification-panel">
					<img class="new-post-picture" src="uploads/images/<?= $Notification['notification_picture'] ?>">
					<span class="noti-desc"><?= $Notification['notification_desc'] ?></span>
				</div>
				<?php
				endwhile;
				?>
				</div>
			</div>
			-->
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="app.js"></script>
<script type="text/javascript" src="assets/js/materialize.js"></script>
<script type="text/javascript" src="assets/js/post-stream.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    var text_max = 240;
    $('#textarea-counter').html(text_max + ' Characters Remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea-counter').html(text_remaining + ' Characters Remaining');
    });
});

$(document).ready(function(){
    $(".button-collapse").sideNav();
    $(".dropdown-button").dropdown();
})
</script>
