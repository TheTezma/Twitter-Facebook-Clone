<?php
session_start();
include ('dbconnect.php');
include ('Twit-Func.php');
include ('format.php');

$LikePostID = $_POST['postid'];
$LikeUserID = $_POST['userid'];

LikePost($LikeUserID, $LikePostID);

echo $LikePostID;
echo $LikeUserID;
?>