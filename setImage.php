<?php
    if(isset($_FILES['custom'])) {
        
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
              
            
        $id = $_POST['id'];    
        $tmpName = $_FILES['custom']['tmp_name'];
        // Read the file

        $fp = fopen($tmpName, 'r');

        $data = fread($fp, filesize($tmpName));

        $data = addslashes($data);

        fclose($fp);
            
        $post_query = "UPDATE advertisements SET  imageFile='$data' WHERE advertisementID='$id'";
            
        mysql_query($post_query);
        mysql_close($conn);
        }

?>