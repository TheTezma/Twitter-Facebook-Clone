<?php
session_start();
include('dbconnect.php');
include('format.php');
include('user.php');

$PostID = $_GET['id'];

$GrabInfoFromPost = $Connect -> query("SELECT user_id FROM posts WHERE id = '$PostID'");
$PostInfo = $GrabInfoFromPost -> fetch_array();

if($PostInfo['user_id'] == $UserID):
	$DeletePost = $Connect -> query("DELETE FROM posts WHERE id = '$PostID'");
	$UpdatePostCount = $Connect -> query("UPDATE users SET user_posts = user_posts - 1 WHERE user_id = '$UserID'");
	header("Location: ../");
else:
	header("Location: ../");
endif;
?>