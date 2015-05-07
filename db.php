<?php

if (!isset($_SESSION))
{
	session_start();
}

$host = "127.0.0.1"; //en prod -> mysql1.alwaysdata.com
$username = "root"; //en prod -> lexiquiz
$password = "root"; //en prod -> pokemon93
$db_name = "lexiquiz_quiz";

$con = mysql_connect($host, $username, $password) or die ("cannot connect");

mysql_query("SET NAMES 'UTF8'");
mysql_select_db("$db_name") or die ("cannot select DB");
?>