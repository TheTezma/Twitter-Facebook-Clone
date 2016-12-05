<?php
include('dbconnect.php');
include('Twit-Func.php');
include('format.php');

$timestamp = time();

if(isset($_GET['message'])&&!empty($_GET['message'])) {
	$message = $_GET['message'];
	$sender = $_GET['sender'];
	$reciever = $_GET['reciever'];

	if(SendMessage($sender, $message, $reciever, $timestamp)) {

	} else {
		echo 'The message could not be sent.';
	}
} else {
	echo 'Empty Message.';
}
?>