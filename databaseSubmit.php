<?PHP   
if (isset($_POST['firstName'])) {
        
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
    
        
        $post_query = "INSERT INTO Events (eventName, locationName, room, eventCategory, eventCost, startTime, endTime, eventDate, sponsor, contactEmail, eventDescription, eventLink, fName, lName, pricePaid) VALUES ('$eventName', '$eventLocation', '$eventRoom', '$eventCategory', '$eventCost', '$startTime', '$endTime', '$eventDate', '$eventSponsor', '$contactEmail', '$eventDescription', '$eventLink','$fName', '$lName', '$3.00')";
        
        mysql_query($post_query);
        mysql_close($conn);

}
?>