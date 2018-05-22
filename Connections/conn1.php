<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn = "localhost";
$database_conn = "scratchcards";
$username_conn = "root";
$password_conn = "";
//$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
$mysqli = new mysqli($hostname_conn,$username_conn,$password_conn,$database_conn) or trigger_error(mysqli_connect_errno(),E_USER_ERROR); 
?>