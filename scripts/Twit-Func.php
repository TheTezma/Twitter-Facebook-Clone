<?php
// Created By Tezma
function GetUserInfo($UserSession) {
	include ('dbconnect.php');
	$query = "SELECT * FROM users WHERE user_id = '$UserSession'";
	$run = $Connect -> query($query);

	$UserData = array();

	while($UserData = $run -> fetch_array()) {
		$User[] = array(
		'user_id'=>$UserData['user_id'],
		'user_name'=>$UserData['user_name'],
		'user_email'=>$UserData['user_email'],
		'user_picture'=>$UserData['user_picture'],
		'user_posts'=>$UserData['user_posts'],
		'user_followers'=>$UserData['user_followers'],
		'user_following'=>$UserData['user_following']
		);

		global $UserID;
		global $Username;
		global $UserEmail;
		global $UserPicture;
		global $UserPosts;
		global $UserFollowing;
		global $UserFollowers;
		$UserID = $UserData['user_id'];
		$Username = $UserData['user_name'];
		$UserEmail = $UserData['user_email'];
		$UserPicture = $UserData['user_picture'];
		$UserPosts = $UserData['user_posts'];
		$UserFollowers = $UserData['user_followers'];
		$UserFollowing = $UserData['user_following'];
	}
}

function GetMessageUsers($UserID) {
	include('dbconnect.php');
	$GrabUsersFollowingSQL = "SELECT * FROM users WHERE (user_id IN (SELECT user_id2 FROM following WHERE user_id1 = $UserID))";
	$GrabUsersFollowing = $Connect -> query($GrabUsersFollowingSQL);
	while($UsersFollowing = $GrabUsersFollowing -> fetch_array()):
		$FollowingUserID = $UsersFollowing['user_id'];
		
		$GrabFollowingUsersSQL = "SELECT * FROM users WHERE (user_id IN (SELECT user_id1 FROM following WHERE user_id2 = $UserID))";
		$GrabFollowingUsers = $Connect -> query($GrabFollowingUsersSQL);
		while($FollowingUsers = $GrabFollowingUsers -> fetch_array()):
			$MessageUserID = $FollowingUsers['user_id'];
			$MessageUsername = $FollowingUsers['user_name'];
			$MessagePicture = $FollowingUsers['user_picture'];
		?>
		<a class="mess-box" href="<?= $MessageUserID ?>"><div class="user-message-box">
			<img class="message-box-picture" src="../uploads/images/<?= $MessagePicture ?>">
			<span class="message-box-username"><?= $MessageUsername ?></span>
		</div></a>
		<?php
		endwhile;

	endwhile;
}

function GetLastMessage($UserID) {
	include('dbconnect.php');
	$GrabLastMessageSQL = "SELECT * FROM messages WHERE user_id1 = '$UserID' ORDER BY timestamp DESC";
	$GrabLastMessage = $Connect -> query($GrabLastMessageSQL);
	$LastMessage = $GrabLastMessage -> fetch_array();
	$LastMessagedUserID = $LastMessage['user_id2'];
	if($_GET['u'] == $LastMessagedUserID) {

	} else {
		header("Location: $LastMessagedUserID");
	}
}

function GetMessages($UserID2) {
	include('dbconnect.php');
	$query = "SELECT * FROM messages WHERE user_id2 = '$UserID2' ORDER BY timestamp DESC";

	$run = $Connect -> query($query);

	$messages = array();

	while($message = $run -> fetch_array()) {
		$messages[] = array('user_id1'=>$message['user_id1'],
							'user_id2'=>$message['user_id2'],
							'message'=>$message['message'],
							'timestamp'=>$message['timestamp']);
	}
	return $messages;
}

function SendMessage($sender, $message, $reciever, $timestamp) {
	include('dbconnect.php');
	if(!empty($message)) {
		$query = "INSERT INTO messages (user_id1, user_id2, message, timestamp) VALUES ('$sender', '$reciever', '$message', '$timestamp')";

		if($run = $Connect -> query($query)) {
			return true;
		} else {
			return false;
		}
	}
}

function SubmitPost($UserID, $content, $timestamp, $UserPicture, $UserName, $Hashtag) {
	include ('dbconnect.php');
	if(!empty($content)) {
		$query = "INSERT INTO posts (user_id, username, picture, content, timestamp) VALUES ('$UserID', '$UserName', '$UserPicture', '$content', '$timestamp')";
		if(empty($Hashtag)) {

		} else {
			$query2 = "SELECT * FROM trending WHERE hashtag = '$Hashtag'";
			if($run2 = $Connect -> query($query2)) {
				$hashquery = $run2 -> fetch_array();

				$query4 = "UPDATE trending SET hits = hits + 1 WHERE hashtag = '$Hashtag'";
				$run4 = $Connect -> query($query4);
			} else {
				$query3 = "INSERT INTO trending (hashtag, hits) VALUES ('$Hashtag', '1')";
				$run3 = $Connect -> query($query3);
			}
		}

		if($run = $Connect -> query($query)) {
			return true;
		} else {
			return false;
		}
	}
}

function LikePost($LikeUserID, $LikePostID) {
	include ('dbconnect.php');
	$query = "INSERT INTO likes (post_id, user_id) VALUES ('$LikePostID', '$LikeUserID')";

	if($run = $Connect -> query($query)) {
		return true;
	} else {
		return false;
	}
}
?>