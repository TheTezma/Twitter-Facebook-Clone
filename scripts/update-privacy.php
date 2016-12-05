<?php
session_start();
include ('dbconnect.php');
include ('user.php');
include ('format.php');

$PrivacyOption = $_POST['info_visible'];

if($PrivacyOption == 1):
	$UpdatePrivSettings = $Connect -> query("UPDATE privacy SET info_vis = 1 WHERE user_id = '$UserID'");
	header("Location: ../settings");
elseif($PrivacyOption == 2):
	$UpdatePrivSettings = $Connect -> query("UPDATE privacy SET info_vis = 2 WHERE user_id = '$UserID'");
	header("Location: ../settings");
endif;
?>