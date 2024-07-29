<?php
$servername = '127.0.0.1';
$mysqli = sqlsrv_connect("\localhost");
sqlsrv_server_info($mysqli);
$dbase = "BANKERS";

// Check connection
if ($mysqli -> connect_errno) {

  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  
  exit();

  }
?>