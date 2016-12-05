<?php
session_start();
include ('dbconnect.php');
include ('user.php');
include ('format.php');

print_r($_FILES);

if(isset($_POST['submit']))
{
	$ImageName = $_FILES['picture']['name'];
	$fileElementName = 'picture';
	$path = '../uploads/images/'; 
	$location = $path . $_FILES['picture']['name']; 
	move_uploaded_file($_FILES['picture']['tmp_name'], $location);
	header("Location: ../settings");

	$UpdatePictureToUsersSQL = $Connect -> query("UPDATE users SET user_picture = '$ImageName' WHERE user_id = '$UserID'");
	$UpdatePictureToPostSQL = $Connect -> query("UPDATE posts SET picture = '$ImageName' WHERE user_id = '$UserID'");
}
?>