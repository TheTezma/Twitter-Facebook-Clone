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
?>