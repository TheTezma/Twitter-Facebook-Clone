<?php
session_start();
include('dbconnect.php');
include('format.php');
include('user.php');

$ProfileFollowUsername = $_GET['username'];

$query = $Connect -> query("SELECT * FROM users WHERE user_name = '$ProfileFollowUsername'");
$UserRow = $query -> fetch_array();
$UserRowID = $UserRow['user_id'];

$query2 = $Connect -> query("DELETE FROM following WHERE user_id1 = '$UserID' AND user_id2 = '$UserRowID'");
$query3 = $Connect -> query("UPDATE users SET user_following = user_following - 1 WHERE user_id = '$UserID'");
$query4 = $Connect -> query("UPDATE users SET user_following = user_followers - 1 WHERE user_id = '$UserRowID'");
header("Location: ../user/".$ProfileFollowUsername);

?>