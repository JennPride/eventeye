<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
      <link rel="shortcut icon" href="../favicon.ico">
      <script src="modernizr.custom.js"></script>
    <title>Event Eye</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
   <?php
// setting timezone 

date_default_timezone_set('America/New_York');

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

$date = date('Y-m-d');
 
      
$sql = "SELECT eventName, locationName, room, eventCategory, eventCost, startTime, endTime, eventDescription, eventLink, sponsor FROM Events WHERE eventDate = '" . $date . "'  ORDER BY startTime ASC";
$eventNames = array();
$result = mysql_query($sql);
if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
}
$noEvents = 0;
if (mysql_num_rows($result) == 0) {
    $noEvents += 1;
}
$index = 0;
while ($row = mysql_fetch_assoc($result)) {
    $eventNames[$index] = $row["eventName"];
    $locationName[$index] = $row["locationName"];
    $room[$index] = $row["room"];
    $eventCategory[$index] = $row["eventCategory"];
    $eventCost[$index] = $row["eventCost"];
    $startTime[$index] = $row["startTime"];
    $endTime[$index] = $row["endTime"];
    $eventDescription[$index] = $row["eventDescription"];
    $eventLink[$index] = $row["eventLink"];
    $index++;
}

$length = count($eventNames);
      
$mapsql = "SELECT Events.eventName, Events.locationName, Events.eventCost, Events.startTime, Events.endTime, location_coordinates.coordinates
FROM Events
INNER JOIN location_coordinates
ON Events.locationName=location_coordinates.locationName
WHERE eventDate = '" . $date . "'  ORDER BY startTime ASC";

$mapResult = mysql_query($mapsql);
if (!$mapResult) {
    echo "Could not successfully run query ($mapsql) from DB: " . mysql_error();
    exit;
}

if (mysql_num_rows($mapResult) == 0) {
    $noEvents = true;
}
$index = 0;
while ($row = mysql_fetch_assoc($mapResult)) {
    $mapEventNames[$index] = $row["eventName"];
    $mapLocationName[$index] = $row["locationName"];
    $mapEventCost[$index] = $row["eventCost"];
    $mapStartTime[$index] = $row["startTime"];
    $mapEndTime[$index] = $row["endTime"];
    $coordinates[$index] = $row["coordinates"];
    $index++;
}

$coordsLength = count($coordinates);
?>
  </head>

  <body>
    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted">Select a day</h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="#">Today</a></li>
            <li><a href="index2.php">Tomorrow</a></li>
            <li><a href="index3.php"><span id="day 3"></span></a></li>
            <li ><a href="index4.php"><span id="day 4"></span></a></li>
            <li><a href="index5.php"><span id="day 5"></span></a></li>
            <li ><a href="index6.php"><span id="day 6"></span></a></li>
            <li ><a href="index7.php"><span id="day 7"></span></a></li>
          </ul>
        </nav>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Event Eye</h1>
        <p class="lead">Discover what's happening near you in seconds!</p> 
    <ul id="eventDisplay">
        <li>
                <div id="map"> 
                </div>
        </li>
        <li>
                  <div class="page-header">
    <h1 id="pageDate"></h1>
  </div>   
            <div class="container">           
<?php if ($noEvents != 0) { ?>
        <h2> There are no events today, sorry!</h2>  
        <?php } else { ?>
            <ul class="timeline">
                <?php for($i = 0; $i <= $length - 1; $i += 1) { ?>
                <?php if($i % 2 ==0) {?>
                <li>
                  <div class="timeline-badge"></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title"><?php echo $eventNames[$i];?></h4>
                      <p><small class="text-muted"><?php echo $startTime[$i]." - " .$endTime[$i];?></small></p>
                        <p><div class="timeline-location"><?php echo $locationName[$i];?></div></p>
                      <p><div class="timeline-cost"><?php echo $eventCost[$i];?></div></p>
                    <p><div class="timeline-description"><?php echo $eventDescription[$i];?></div></p>
                    </div>
                    <div class="timeline-body">
                    </div>
                  </div>
                </li>
                <?php } else { ?>
                <li class="timeline-inverted">
                   <div class="timeline-badge"></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
<h4 class="timeline-title"><?php echo $eventNames[$i];?></h4>
                      <p><small class="text-muted"><?php echo $startTime[$i]." - " .$endTime[$i];?></small></p>
                        <p><div class="timeline-location"><?php echo $locationName[$i];?></div></p>
                      <p><div class="timeline-cost"><?php echo $eventCost[$i];?></div></p>
                    <p><div class="timeline-description"><?php echo $eventDescription[$i];?></div></p>
                    </div>
                    <div class="timeline-body">
                    </div>
                  </div>
                  </li>
                <?php } ?>
            <?php } ?>
                  </li>
                </ul>
            <?php } ?>
                </div>
    </table>

      <!-- Example row of columns -->
    
    <div class="row">
        <div class="col-lg-4">
          <h2>Want to submit a non-profit event?</h2>
          <p>Want to market a free event on Event Eye? Not-for-profit event submissions can be sent to EventEyeApp@Gmail.com. Please include all relevant organization and event information in your submission. Our interactive map can help to spread the word about your event at no cost to you!</p>
          <p><a class="btn btn-primary" href="mailto:EventEyeApp@Gmail.com" role="button">Submit Event Here &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Want to submit a for-profit event?</h2>
          <p>Want to market a for-profit event on Event Eye? Fill out our Event Submission Form below to pricing information and see payment options. Let us help make your event successful at little cost to you! For questions or more information, please contact eventeyeapp@gmail.com. 
</p>
          <p><a class="btn btn-primary" href="eventForm.php" role="button">Submit Event &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Interested in advertising on Event Eye?</h2>
          <p>Interested in posting an advertisement on the Event Eye site? Submit advertisement information using our Advertisement Submission Form below and let us help bring traffic to your organization or event. Pricing dependent on duration or advertisement. 
</p>
          <p><a class="btn btn-primary" href="marketingForm.php" role="button">Submit Advertisement &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Event Eye, Inc.</p>
      </footer>

    </div> <!-- /container -->
      
      
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js">
      
    </script>
    
      <!-- Google Mpas API load -->
      
    <script src="https://maps.googleapis.com/maps/api/js"
         async defer></script>
    <script>

        // Inititating the Google Map which should be moved to a seperate JS file
        function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 38.98676, lng: -76.942619},
                zoom: 15
            });
        <?php 
        if ($coordinates[0] != null)  {
            foreach($coordinates as $a){ ?>
                var polygon = new google.maps.Polygon({
                paths: [<?=$a?>],
                strokeColor: '#000000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor:'#00EE00',
                fillOpacity: 0.35
        });
        polygon.setMap(map);
        <?php 
            } 
        }?> 
        
        // Construct the polygon. 
        //}
        /*var marker = new google.maps.Marker({
            position: {lat: 38.98676, lng: -76.942619},
            map: map,
            title: 'Hello World!'
        });
            
            marker.setMap(map);*/
          }
      </script>
      <script>
        
        //getting today's date for the page and writing it  
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth();
        var yyyy = today.getFullYear();
        var monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"
                        ];
        document.getElementById("pageDate").innerHTML = monthNames[mm] + " " + dd + ", " + yyyy;
        
         //getting the dates to list on the top bar
        
        var dayThree = new Date();
        dayThree.setDate(dayThree.getDate() + 2);
        var d3 = dayThree.getDate();
        var m3 = dayThree.getMonth();
        document.getElementById("day 3").innerHTML = monthNames[m3] + " "  + d3;
          
         var dayFour = new Date();
        dayFour.setDate(dayFour.getDate() + 3);
        var d4 = dayFour.getDate();
        var m4 = dayFour.getMonth();
        document.getElementById("day 4").innerHTML = monthNames[m4] + " "  + d4;
        
           var dayFive = new Date();
        dayFive.setDate(dayFive.getDate() + 4);
        var d5 = dayFive.getDate();
        var m5 = dayFive.getMonth();
        document.getElementById("day 5").innerHTML = monthNames[m5] + " "  + d5;
        
           var daySix = new Date();
        daySix.setDate(daySix.getDate() + 5);
        var d6 = daySix.getDate();
        var m6 = daySix.getMonth();
        document.getElementById("day 6").innerHTML = monthNames[m6] + " "  + d6;
        
        var daySeven = new Date();
        daySeven.setDate(daySeven.getDate() + 6);
        var d7 = daySeven.getDate();
        var m7 = daySeven.getMonth();
        document.getElementById("day 7").innerHTML = monthNames[m7] + " "  + d7;
          
      
      </script>
      
      <!-- callback function for map -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
  </body>
</html>