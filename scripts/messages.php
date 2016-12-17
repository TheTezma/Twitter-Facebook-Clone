<?php
session_start();
include 'dbconnect.php';
include 'Twit-Func.php';
include 'format.php';

$GetConversations = $Connect -> query("SELECT * FROM conversations WHERE user_id1 = '$UserID' OR user_id2 = '$UserID'");
$Conversations = $GetConversations -> fetch_array();


?>