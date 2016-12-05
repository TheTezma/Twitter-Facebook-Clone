<?php
session_start();
include ('dbconnect.php');
include ('user.php');
include ('format.php');

$CommentContent = $_POST['comment-content'];
$CommentUsername = $UserName;
$CommentDate = time();
$CommentUserID = $UserID;
$CommentUserPicture = $UserPicture;
$CommentPostID = $_POST['post-id'];

$InsertComment = $Connect -> query("INSERT INTO comments 
	(post_id, 
	comment_user_id, 
	comment_username, 
	comment_picture, 
	comment_content, 
	comment_date) 
	VALUES 
	('$CommentPostID', 
	'$CommentUserID', 
	'$CommentUsername', 
	'$CommentUserPicture', 
	'$CommentContent', 
	'$CommentDate')");

if($Connect -> query($InsertComment) === TRUE) {
	header("Location: ../");
	$ErrorMsg = "";
} else {
	header("Location: ../");
	$ErrorMsg = "Post Could Not Be Created. Please Try Again Later.";
}
?>