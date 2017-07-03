<?php

date_default_timezone_set('America/New_York');
$today = date('Y-m-d');
    $host = "bmgt407.rhsmith.umd.edu";
    $user = "bmgt407_17";
    $password = "bmgt407_17";
    $dbname = "bmgt407_17_db";
    $port = "22";

  $conn = mysqli_connect($host, $user, $password, $dbname);

   
$sql = "SELECT imageFile FROM advertisements WHERE displayStartDate <='".$today."' AND displayEndDate >='".$today."' AND paymentStatus = 'Completed'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    $sql = "SELECT imageFile FROM advertisements WHERE advertisementID='1'";
    $result = mysqli_query($conn, $sql);
}

$row = mysqli_fetch_assoc($result);
header("Content-type: image");
echo $row['imageFile'];


?>