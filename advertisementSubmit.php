<?php
date_default_timezone_set('America/New_York');

if(isset($_POST['firstName'])) {
    
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
         
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $advertiserEmail = $_POST['email'];
        $sponsor = $_POST['sponsor'];
        $displayStartDate = $_POST['startDate'];
        $eventID = $_POST['eventID'];
        $imageAlt = $_POST['alt'];
        $days = $_POST['os0'];
        $tmpName = $_FILES['imageFile']['tmp_name'];
        // Read the file
        
    
    
        $fp = fopen($tmpName, 'r');

        $data = fread($fp, filesize($tmpName));

        $data = addslashes($data);

        fclose($fp);
        
        if ($days == "1 Day") {
            $addDays = 0;
        } else if ($days == "2 Days") {
            $addDays = 1;
        } else if ($days == "3 Days") {
            $addDays = 2;
        } else if ($days == "4 Days") {
            $addDays = 3;
        } else if ($days == "5 Days") {
            $addDays = 4;
        } else if ($days == "6 Days") {
            $addDays = 5;
        } else if ($days == "7 Days") {
            $addDays = 6;
        } else if ($days == "8 Days") {
            $addDays = 7;
        } else if ($days == "9 Days") {
            $addDays = 8;
        } else if ($days == "10 Days") {
            $addDays = 9;
        }
    
    
        $displayEndDate = date("Y-m-d", strtotime("{$displayStartDate} + {$addDays} days"));
        
        
        $post_query = "INSERT INTO advertisements (fName, lName, advertiserEmail, sponsor, displayStartDate, displayEndDate, eventID, imageAlt, imageFile) VALUES ('$fName', '$lName', '$advertiserEmail', '$sponsor', '$displayStartDate', '$displayEndDate', '$eventID', '$imageAlt', '$data')";
        
        mysql_query($post_query);
        mysql_close($conn);

        }   
    
?>