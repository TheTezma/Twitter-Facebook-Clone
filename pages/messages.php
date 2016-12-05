<?php
session_start();
include ('../scripts/dbconnect.php');
include ('../scripts/user.php');
include ('../scripts/format.php');
include ('../scripts/Twit-Func.php');

$UserID2 = $_GET['u'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Not-Facebook</title>
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/post-css.css">
<link rel="stylesheet" type="text/css" href="../assets/css/framework.css">
<script type="text/javascript" href="../js/site.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato|Rubik" rel="stylesheet">
</head>
<body>
<ul class="topnav" id="myTopnav">
  	<li><a class="left-nav" href="../">Home</a></li>
  	<li><a href=""></a></li>
  	<li class="icon">
    	<a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  	</li>
</ul>

<div class="container-fluid">
	<div class="col-sm-3">
		<div class="dashboard-panel">
			<?php GetMessageUsers($UserID) ?>
			<?php GetLastMessage($UserID) ?>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="dashboard-panel" id="send-message">
			<div id="form-box">
				<form action="#" method="POST" id="form-send-message">
					<input type="text" name="message" id="message" class="message" placeholder="Type a message.." autocomplete="off">
					<input type="text" name="sender" id="sender" value="<?= $UserID ?>" hidden>
					<input type="text" name="reciever" id="reciever" value="<?= $UserID2 ?>" hidden>
					<input type="submit" name="send" value="Send Message" id="send" class="send-msg">
				</form>
			</div>
		</div>
		<div class="dashboard-panel">
			<div id="messages"></div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="dashboard-panel">
			<div class="dashboard-panel-header"><span>Notifications</span></div>
			<div class="dashboard-panel-body">

			</div>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="../app.js"></script>
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
</script>
