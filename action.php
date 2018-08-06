<?php
session_start();
$database ='project';
$username = 'root'; 
$password = '';
$_SESSION['build'] = $_POST['name'];

$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}
?>