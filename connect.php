<?php
$host = "bmgt407.rhsmith.umd.edu";
$user = "bmgt407_17";
$password = "bmgt407_17";
$dbname = "bmgt407_17_db";
$port = "22";

// Create connection
$conn = mysql_connect($host, $user, $password, $dbname);
// Check connection
if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
} 
      
if (!mysql_select_db($dbname)) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}

?>