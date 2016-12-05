<?php
session_start();
include('Twit-Func.php');
include('dbconnect.php');
include('format.php');

$UserSession = $_SESSION['userSession'];
GetUserInfo($UserSession);


?>