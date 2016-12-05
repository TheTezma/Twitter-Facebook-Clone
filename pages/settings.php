<?php
session_start();
include ('../scripts/dbconnect.php');
include ('../scripts/user.php');
include ('../scripts/format.php');

$ErrorMsg = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Not-Facebook</title>

<script src="assets/js/site.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/post-css.css">
<link rel="stylesheet" type="text/css" href="assets/css/framework.css">
<script type="text/javascript" href="js/site.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato|Rubik" rel="stylesheet">
</head>
<body>
<ul class="topnav" id="myTopnav">
  	<li><a class="left-nav" href=".">Home</a></li>
  	<li><a href=""></a></li>
  	<li class="icon">
    	<a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  	</li>
</ul>

<div class="container-fluid">
	<div class="col-sm-3">
		<div class="dashboard-panel fixed">
			<div class="dashboard-panel-body">
				<img class="user-picture" src="uploads/images/<?= $UserPicture ?>">
				<a href="user/<?= $UserName ?>" class="user-name"><?= $UserName ?></a>
				<a href="settings" class="settings-icon"><span class="glyphicon glyphicon-cog settings-icon"></span></a>
			</div>
		</div>
		<div class="dashboard-panel">
			<table class="user-stats">
				<tr>
					<th class="posts-col">&nbsp;&nbsp;&nbsp;Posts</th>
					<th class="followers-col">Followers</th>
					<th class="following-col">Following</th>
				</tr>
				<tr>
					<td class="posts-col">&nbsp;&nbsp;&nbsp;<?= $UserPosts ?></td>
					<td class="followers-col"><?= $UserFollowers ?></td>
					<td class="following-col"><?= $UserFollowing ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="dashboard-panel">
			<div class="dashboard-panel-header">
				<h3 style="margin:0; padding: 5px;">Account</h3>
				<label style="padding:5px;padding-top: 0px;">Change your basic account settings</label>
			</div>
			<?php

			?>
			<div class="dashboard-panel-body">
				<form action="scripts/update-picture.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-sm-3" for="picture">Picture:</label>
						<div class="col-sm-6">
							<input type="file" class="form-control" name="picture" id="picture">
						</div>
						<div class="col-sm-2">
					    	<button type="submit" name="submit" class="btn btn-primary settings-btn">Save Picture</button>
					    </div>
					</div>
				</form>
				<form action="scripts/update-email.php" method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3" for="email">Email:</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" id="email" value="<?= $UserEmail ?>">
						</div>
						<div class="col-sm-2">
					    	<button type="submit" name="submit" class="btn btn-primary settings-btn">Save Email</button>
					    </div>
					</div>
				</form>
				<form action="scripts/update-privacy.php" method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-sm-3" for="info_visible">Info Visibility:</label>
						<div class="col-sm-6">
							<select class="form-control" name="info_visible" id="info_visible">
								<?php
								$GetPrivSettings = $Connect -> query("SELECT info_vis, photo_vis FROM privacy WHERE user_id = '$UserID'");
								while($PrivSettings = $GetPrivSettings -> fetch_array()):
									if($PrivSettings['info_vis'] == 1):
										echo "<option value='1'>Visible To Everyone</option>";
										echo "<option value='2'>Only Visible To Followers</option>";
									else:
										echo "<option value='2'>Only Visible To Followers</option>";
										echo "<option value='1'>Visible To Everyone</option>";
									endif;
								endwhile;
								?>
							</select>
						</div>
						<div class="col-sm-2">
							<button type="submit" name="submit" class="btn btn-primary settings-btn">Save Privacy</button>
						</div>
					</div>
				</form>
			</div>
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
