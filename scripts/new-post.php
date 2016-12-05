<?php
session_start();
include ('dbconnect.php');
include ('user.php');
include ('format.php');
include ('Twit-Func.php');

$timestamp = time();

if(isset($_GET['textarea'])&&!empty($_GET['textarea'])) {
	$content = $_GET['textarea'];

	if(SubmitPost($UserID, $content, $timestamp, $UserPicture, $UserName)) {

	} else {
		echo 'The message could not be sent.';
	}
} else {
	echo 'A big error occured.';
}
?>