<?php
session_start();
include ('dbconnect.php');
include ('user.php');
include ('format.php');

$email = $_POST['email'];
$email_exists = $Connect -> query("SELECT * FROM users WHERE user_email = '$email'");
$check = $email_exists -> num_rows;

if($check == 0) {
	$UpdateEmail = $Connect -> query("UPDATE users SET user_email = '$email' WHERE user_id = '$UserID'");
	header("Location: ../settings");
} else {
	header("Location: ../settings");
}
?>