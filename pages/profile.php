<?php
session_start();
include ('../scripts/dbconnect.php');
include ('../scripts/user.php');
include ('../scripts/format.php');

$ProfileUserName = $_GET['u'];
$GrabUserInfo = $Connect -> query("SELECT * FROM users WHERE user_name = '$ProfileUserName'");
$ProfileInfo = $GrabUserInfo -> fetch_array();
$ProfileUserID = $ProfileInfo['user_id'];
$ProfileUserName = $ProfileInfo['user_name'];
$ProfilePicture = $ProfileInfo['user_picture'];
$ProfileUserPosts = $ProfileInfo['user_posts'];
$ProfileUserFollowers = $ProfileInfo['user_followers'];
$ProfileUserFollowing = $ProfileInfo['user_following'];
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
<link rel="stylesheet" type="text/css" href="../assets/css/profile.css">
<script type="text/javascript" href="app.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato|Rubik" rel="stylesheet">
<script>
	$( function() {
    $( "#tabs" ).tabs();
  } );
</script>
</head>
<body>
<ul class="topnav" id="myTopnav">
  	<li><a class="active left-nav" href="../">Home</a></li>
  	<li class="icon">
    	<a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  	</li>
</ul>

<div class="container-fluid">
	<div class="col-sm-3">
		<div class="dashboard-panel fixed">
			<div class="dashboard-panel-body">
				<img class="user-picture" src="../uploads/images/<?= $ProfilePicture ?>">
				<a href="<?= $ProfileUserName ?>" class="user-name"><?= $ProfileUserName ?></a>
				<a href="../settings" class="settings-icon"><span class="glyphicon glyphicon-cog settings-icon"></span></a>
			</div>
		</div>
		<div class="new-post-panel">
			<table class="user-stats">
				<tr>
					<th>&nbsp;&nbsp;&nbsp;Posts</th>
					<th>Followers</th>
					<th>Following</th>
				</tr>
				<tr>
					<td>&nbsp;&nbsp;&nbsp;<?= $ProfileUserPosts ?></td>
					<td><?= $ProfileUserFollowers ?></td>
					<td><?= $ProfileUserFollowing ?></td>
				</tr>
			</table>
		</div>
		<div class="new-post-panel" style="padding:5px;">
		<?php
		$query = $Connect -> query("SELECT id FROM following WHERE user_id1 = '$UserID' AND user_id2 = '$ProfileUserID'");
		if(mysqli_num_rows($query) >= 1): ?>
			<a class="btn btn-danger" href="../scripts/unfollow.php?username=<?= $ProfileUserName ?>">Unfollow</a>
			<?php
			$query1 = $Connect -> query("SELECT id FROM following WHERE user_id1 = '$ProfileUserID' AND user_id2 = '$UserID'");
			if(mysqli_num_rows($query1) >= 1):
				?>
				<a class="btn btn-default" href="javascript:register_popup('<?= $ProfileUserID ?>', '<?= $ProfileUserName ?>');">Message</a>
			<?php
			else:
				echo "";
			endif;
			?>
		<?php else: ?>
			<a class="btn btn-primary" href="../scripts/follow.php?username=<?= $ProfileUserName ?>">Follow</a>		
		<?php 
		endif;
		?>
		</div>		
		<ul class="nav nav-pills">
		  <li class="active"><a data-toggle="pill" href="#posts">Posts</a></li>
		  <li><a data-toggle="pill" href="#about">About</a></li>
		  <li><a data-toggle="pill" href="#photos">Photos</a></li>
		</ul>
	</div>
	<div class="col-sm-6">
		<div class="tab-content">
			<div id="posts" class="tab-pane active">
			<?php
			$GrabProfilePosts = $Connect -> query("SELECT * FROM posts WHERE user_id = '$ProfileUserID' ORDER BY timestamp");
			while($ProfilePosts = $GrabProfilePosts -> fetch_array()):
			?>
			<div class="dashboard-panel post-panel" data-toggle="modal" data-target="#<?= $ProfilePosts['id'] ?>">
		<div class="dashboard-panel-body">
			<img class="post-user-picture" src="../uploads/images/<?= $ProfilePosts['picture'] ?>">
			<span class="post-user-name"><a href="<?= $ProfilePosts['username'] ?>"><?= $ProfilePosts['username'] ?></a></span>
			<span class="post-user-time"> - <?= getTime($ProfilePosts['timestamp']) ?></span>
			<p><?= $ProfilePosts['content'] ?></p>
		</div>
	</div>

	<!-- Modal -->
	<div id="<?= $ProfilePosts['id'] ?>" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <img class="modal-user-picture" src="../uploads/images/<?= $ProfilePosts['picture'] ?>">
	        <span class="modal-user-name"><a href="<?= $ProfilePosts['username'] ?>"><?= $ProfilePosts['username'] ?></a></span>
	      </div>
	      <div class="modal-body">
	        <p class="modal-post-content"><?= $ProfilePosts['content'] ?></p>
	      </div>
	      <div class="modal-footer">
	      	<?php
			if($ProfilePosts['user_id'] == $UserID):
				echo "<button data-toggle='modal' data-target='#delete".$ProfilePosts['id']."' class='btn btn-danger'>Delete</button>";
			else:
				
			endif;
			?>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	      <div class="post-comment-header">
	        	<form>
	        		<textarea class="form-control comment-textarea" id="textarea" name="comment-content" maxlength="240" placeholder="Write your post here"></textarea>
	        		<div class="post-comment-footer">
	        			<input type="submit" name="submit-post" value="Post" class="btn btn-primary">
	        			<button onclick="ClearText()" type="button" class="btn btn-danger">Clear Text</button>
						<span class="textcount" id="textarea-counter">240 Characters Remaining</span>
	        		</div>
	        	</form>
	        </div>
	    </div>

	  </div>
	</div>
	<?php
	if($ProfilePosts['user_id'] == $UserID):
		echo "
				<div id='delete".$ProfilePosts['id']."' class='modal fade' role='dialog' style='margin-top:250px;'>
				  <div class='modal-dialog'>

				    <!-- Modal content-->
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <p class='delete-conf-msg'>Are you sure you want to delete this post?</p>
				      </div>
				      <div class='modal-body'>
				      	<form action='scripts/delete-post.php?id=".$ProfilePosts['id']."' method='POST'>
				      		<input type='submit' class='btn btn-danger' name='yes' value='Yes'>
				      		<button type='button' class='btn btn-default' data-dismiss='modal'>No</button>
				      	</form>
				      </div>
				    </div>

				  </div>
				</div>
				";
	else:

	endif;
	?>
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
	<?php
			endwhile;
			?>
			</div>
			<div id="about" class="tab-pane">
			   	<h3>Menu 1</h3>
			   	<p>Some content in menu 1.</p>
			</div>
			<div id="photos" class="tab-pane">
				<h3>Menu 2</h3>
				<p>Some content in menu 2.</p>
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
<script type="text/javascript" src="../assets/js/site.js"></script>