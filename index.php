<?php
// TEZMA
session_start();
include_once ('scripts/dbconnect.php');

if(isset($_SESSION['userSession'])!=""):
	include ('pages/main.php');
else:
	include ('pages/welcome.php');
endif;
?>

	
