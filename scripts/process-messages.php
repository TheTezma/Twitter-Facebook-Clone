<?php
session_start();
include('dbconnect.php');
include('Twit-Func.php');
include('format.php');

$user_id = $_SESSION['userSession'];
$GrabUserData = $Connect -> query("SELECT * FROM users WHERE user_id = '$user_id'");
$UsersData = $GrabUserData -> fetch_array();
$username = $UsersData['user_name'];

$GrabLastMessageSQL = "SELECT * FROM messages WHERE user_id1 = '$user_id' ORDER BY timestamp DESC";
$GrabLastMessage = $Connect -> query($GrabLastMessageSQL);
$LastMessage = $GrabLastMessage -> fetch_array();
$UserID2 = $LastMessage['user_id2'];

$messages = GetMessages($UserID2);
foreach($messages as $message) {
	$GrabMsgData = $Connect -> query("SELECT user_name FROM users WHERE user_id = ".$message['user_id1']."");
	$MsgData = $GrabMsgData -> fetch_array();
	if($MsgData['user_name'] == $username) {
		$msgboxclass = "msg-self";
	} else {
		$msgboxclass = "msg-other";
	}
	?>
	<div class="msg-box">
		<div class="<?= $msgboxclass ?>">
			<span><?= getTime($message['timestamp']) ?> - </span>
			<span><?= $MsgData['user_name'] ?>: </span>
			<span><?= $message['message'] ?></span>
		</div>
	</div>
	<?php
}
?>