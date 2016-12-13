<?php
session_start();
include('Twit-Func.php');
include('dbconnect.php');
include('format.php');

$UserSession = $_SESSION['userSession'];
GetUserInfo($UserSession);

	$GrabUserPostsSQL = "SELECT * FROM posts WHERE user_id = $UserID OR (user_id IN (SELECT user_id2 FROM following WHERE user_id1 = $UserID)) ORDER BY timestamp DESC LIMIT 1";

	$GrabUserPosts = $Connect -> query($GrabUserPostsSQL);
	while($Posts = $GrabUserPosts -> fetch_array()):
		$PostID = $Posts['id'];
		?>
		<div id="post">
			<div class="dashboard-panel post-panel">
				<div class="dashboard-panel-body">
					<img class="post-user-picture" src="uploads/images/<?= $Posts['picture'] ?>">
					<span class="post-user-name"><a href="user/<?= $Posts['username'] ?>"><?= $Posts['username'] ?></a></span><br>
					<span class="post-user-time"><?= getTime($Posts['timestamp']) ?></span>
					<?php $new_tweet = preg_replace('/@(\\w+)/','<a href=user/$1>$0</a>',$Posts['content']); ?>
					<?php $new_tweet = preg_replace('/#(\\w+)/','<a href=./hashtag/$1>$0</a>',$new_tweet); ?>
					<p><?= $new_tweet ?></p>
				</div>
			</div>
			<div class="post-panel-footer">
				<button class="like-btn" onclick="likePost()" post-id="<?= $Posts['id'] ?>" user-id="<?= $UserID ?>">Like</button>
				<span id="likes"></span>
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
		</div>
		<?php
	endwhile;

?>