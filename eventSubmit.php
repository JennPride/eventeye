

<?php
    $captcha = '';
    if((isset($_POST['firstName'])) and (isset($_POST['lastName'])) and (isset($_POST['email'])) and (isset($_POST['cost'])) and (isset($_POST['eventName'])) and (isset($_POST['description'])) and (isset($_POST['location'])) and (isset($_POST['room'])) and (isset($_POST['category'])) and (isset($_POST['sponsor']))  and (isset($_POST['sTime']))  and (isset($_POST['eTime'])) and (isset($_POST['eventDate']))  and (isset($_POST['eventUrl'])) and (isset($_POST['recaptcha']))) {
    
    $captcha = $_POST['recaptcha'];

    if (!$captcha)
        echo 'The captcha has not been checked.';
    // handling the captcha and checking if it's ok
    $secret = '6LdC1R0TAAAAAEXTV3EazVijAk4ol1fjawNlE25I';
    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);

    var_dump($response);

    // if the captcha is cleared with google, send the mail and echo ok.
    if ($response['success'] != false) {
       
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
        
        
        $fName = mysql_real_escape_string($_POST['firstName']);
        $lName = mysql_real_escape_string($_POST['lastName']);
        $contactEmail = $_POST['email'];
        $eventName= mysql_real_escape_string($_POST['eventName']);
        $eventLocation = $_POST['location'];
        $eventCategory = $_POST['category'];
        $eventCost = $_POST['cost'];
        $eventRoom = $_POST['room'];
        $eventLink = $_POST['eventUrl'];
        $eventSponsor = mysql_real_escape_string($_POST['sponsor']);
        $startTime = $_POST['sTime'];
        $endTime = $_POST['eTime'];
        $eventDate = $_POST['eventDate'];
        $eventDescription = mysql_real_escape_string($_POST['description']);
        
        
        $post_query = "INSERT INTO Events (eventName, locationName, room, eventCategory, eventCost, startTime, endTime, eventDate, sponsor, contactEmail, eventDescription, eventLink, fName, lName) VALUES ('$eventName', '$eventLocation', '$eventRoom', '$eventCategory', '$eventCost', '$startTime', '$endTime', '$eventDate', '$eventSponsor', '$contactEmail', '$eventDescription', '$eventLink','$fName', '$lName')";
        
        mysql_query($post_query);
        mysql_close($conn);
        }    
    } else {
        alert('not ok');
    }
?>