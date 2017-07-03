	
<?php
    
$host = "bmgt407.rhsmith.umd.edu";
    $user = "bmgt407_17";
    $password = "bmgt407_17";
    $dbname = "bmgt407_17_db";
    $port = "22";

    $contactEmail = $_POST['payer_email'];
    $eventID = $_POST['custom'];
    
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
    
    $post_query = "UPDATE Events SET payPalEmail='$contactEmail', paymentStatus='Complete' WHERE eventID='$eventID'";
    
    mysql_query($post_query);
    mysql_close($conn);
   ?>
