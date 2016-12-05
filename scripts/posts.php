<?php
include ('dbconnect.php');

$User = $_SESSION['userSession'];

$GrabUserData = $Connect -> query("SELECT * FROM users WHERE user_id = ".$User."");
$UserData = $GrabUserData -> fetch_array();

$UserID = $UserData['user_id'];
$UserName = $UserData['user_name'];
$UserEmail = $UserData['user_email'];
$UserPicture = $UserData['user_picture'];
$UserPosts = $UserData['user_posts'];
$UserFollowers = $UserData['user_followers'];
$UserFollowing = $UserData['user_following'];

$GrabUserPostsSQL = "SELECT * FROM posts WHERE user_id = $UserID OR (user_id IN (SELECT user_id2 FROM following WHERE user_id1 = $UserID)) ORDER BY timestamp DESC";

$GrabUserPosts = $Connect -> query($GrabUserPostsSQL);
while($Posts = $GrabUserPosts -> fetch_array()):
	?>
	<div class="dashboard-panel post-panel" data-toggle="modal" data-backdrop="true" data-target="#<?= $Posts['id'] ?>">
		<div class="dashboard-panel-body">
			<img class="post-user-picture" src="uploads/images/<?= $Posts['picture'] ?>">
			<span class="post-user-name"><a href="user/<?= $Posts['username'] ?>"><?= $Posts['username'] ?></a></span>
			<span class="post-user-time"> - <?= getTime($Posts['timestamp']) ?></span>
			<?php $new_tweet = preg_replace('/@(\\w+)/','<a href=user/$1>$0</a>',$Posts['content']); ?>
			<?php $new_tweet = preg_replace('/#(\\w+)/','<a href=./hashtag/$1>$0</a>',$new_tweet); ?>
			<p><?= $new_tweet ?></p>
		</div>
	</div>

	<!-- Modal -->
	<div id="<?= $Posts['id'] ?>" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <img class="modal-user-picture" src="uploads/images/<?= $Posts['picture'] ?>">
	        <span class="modal-user-name"><a href="user/<?= $Posts['username'] ?>"><?= $Posts['username'] ?></a></span>
	      </div>
	      <div class="modal-body">
	      	<?php $new_tweet = preg_replace('/@(\\w+)/','<a href=user/$1>$0</a>',$Posts['content']); ?>
			<?php $new_tweet = preg_replace('/#(\\w+)/','<a href=./hashtag/$1>$0</a>',$new_tweet); ?>
			<p class="modal-post-content"><?= $new_tweet ?></p>
	      </div>
	      <div class="modal-footer">
	      	<?php
			if($Posts['user_id'] == $UserID):
				echo "<button data-toggle='modal' data-target='#delete".$Posts['id']."' class='btn btn-danger'>Delete</button>";
			else:

			endif;
			?>
	      </div>
	      <div class="post-comment-header">
	      	<form action="scripts/comment.php" method="POST">
	        	<textarea class="form-control comment-textarea" id="textarea" name="comment-content" maxlength="240" placeholder="Write your post here"></textarea>
	        		<div class="post-comment-footer">
	        		<input type="text" name="post-id" style="display:none;" value="<?= $Posts['id'] ?>">
	        		<input type="submit" name="submit-post" value="Post" class="btn btn-primary">
	        		<button onclick="ClearText()" type="button" class="btn btn-danger">Clear Text</button>
					<span class="textcount" id="textarea-counter">240 Characters Remaining</span>
	        	</div>
	       	</form>
	      </div>
	      <?php
	      $PostID = $Posts['id'];
	      $GrabPostCommentsSQL = "SELECT * FROM comments WHERE post_id = $PostID ORDER BY comment_date DESC";
	      $GrabPostComments = $Connect -> query($GrabPostCommentsSQL);
	      while($PostComments = $GrabPostComments -> fetch_array()):
	      ?>
	  	  <div class="comment-panel">
	  	  	<img class="post-user-picture" src="uploads/images/<?= $PostComments['comment_picture'] ?>">
			<span class="post-user-name"><a href="user/<?= $PostComments['comment_username'] ?>"><?= $PostComments['comment_username'] ?></a></span>
			<span class="post-user-time"> - <?= getTime($PostComments['comment_date']) ?></span>
			<p><?= $PostComments['comment_content'] ?></p>
	  	  </div>
	      <?php
	      endwhile;
	      ?>
	  </div>

	  </div>
	</div>
	<?php
	if($Posts['user_id'] == $UserID):
		echo "
				<div id='delete".$Posts['id']."' class='modal fade' role='dialog' style='margin-top:250px;'>
				  <div class='modal-dialog'>

				    <!-- Modal content-->
				    <div class='modal-content'>
				      <div class='modal-header'>
				        <p class='delete-conf-msg'>Are you sure you want to delete this post?</p>
				      </div>
				      <div class='modal-body'>
				      	<form action='scripts/delete-post.php?id=".$Posts['id']."' method='POST'>
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
