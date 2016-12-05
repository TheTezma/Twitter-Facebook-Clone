<?php
session_start();
include('dbconnect.php');
include('format.php');
include('user.php');

$ProfileFollowUsername = $_GET['username'];

$query = $Connect -> query("SELECT * FROM users WHERE user_name = '$ProfileFollowUsername'");
$UserRow = $query -> fetch_array();
$UserRowID = $UserRow['user_id'];
$TimeStamp = time();

$query1 = $Connect -> query("SELECT id FROM following WHERE user_id1 = '$UserID' AND user_id2 = '$UserRowID'");
$NotificationDesc = "$UserName has followed you!";

if(mysqli_num_rows($query1) >= 1):
	header("Location: ../user/".$ProfileFollowUsername);
else:
	$query2 = $Connect -> query("INSERT INTO following (user_id1, user_id2) VALUES ('$UserID', '$UserRowID')");
	$query3 = $Connect -> query("UPDATE users SET user_following = user_following + 1 WHERE user_id = '$UserID'");
	$query4 = $Connect -> query("UPDATE users SET user_following = user_followers + 1 WHERE user_id = '$UserRowID'");
	$query5 = $Connect -> query("INSERT INTO notifications (user_id1, user_id2, notification_desc, notification_time) VALUES ('$UserID', '$UserRowID', '$NotificationDesc', '$TimeStamp')");
	header("Location: ../user/".$ProfileFollowUsername);
endif;
?>