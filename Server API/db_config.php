<?php
$db_host = 'localhost'; //hostname
$db_user = 'fr_api'; // username
$db_password = 'test20151!'; // password
$db_name = 'facial_recognition'; //database name
$conn = mysql_connect($db_host, $db_user, $db_password );
mysql_select_db($db_name, $conn);

?>
