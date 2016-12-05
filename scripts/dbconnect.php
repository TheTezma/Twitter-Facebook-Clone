<?php

	 $DB_host = "localhost";
	 $DB_user = "root";
	 $DB_pass = "";
	 $DB_name = "usersystem";
	 
	 $Connect = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($Connect->connect_errno)
     {
         die("ERROR : -> ".$Connect->connect_error);
     }

?>