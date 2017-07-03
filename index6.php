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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="css/magnific-popup.css"> 
      
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]--> 
   <?php
// setting timezone 
error_reporting(E_ALL ^ E_DEPRECATED);
date_default_timezone_set('America/New_York');

include 'settings.php';

$date = date('Y-m-d', strtotime('+5 days'));
$sql = "SELECT eventName, locationName, room, eventCategory, eventCost, startTime, endTime, eventDescription, eventLink, sponsor FROM Events WHERE eventDate = '" . $date . "' AND (paymentStatus = 'Completed' OR pricePaid = '0' OR pricePaid IS NULL) ORDER BY startTime ASC";
$eventNames = array();
$result = mysql_query($sql);
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
WHERE Events.eventDate = '" . $date . "' AND (Events.paymentStatus = 'Completed' OR Events.pricePaid = '0' OR Events.pricePaid IS NULL) ORDER BY Events.locationName ASC";

$mapResult = mysql_query($mapsql);
if (!$mapResult) {
    echo "Could not successfully run query ($mapsql) from DB: " . mysql_error();
    exit;
}

$coordinates = array();
      
if (mysql_num_rows($mapResult) == 0) {
    $noEvents = true;
}
$index = 0;
$mapLocationName = array();
$mapEventNames = array();
while ($row = mysql_fetch_assoc($mapResult)) {
    $mapEventNames[$index] = $row["eventName"];
    $mapLocationName[$index] = $row["locationName"];
    $mapEventCost[$index] = $row["eventCost"];
    $mapStartTime[$index] = $row["startTime"];
    $mapEndTime[$index] = $row["endTime"];
    $coordinates[$index] = $row["coordinates"];
    $index++;
}

      
$uniqueLocations = array_unique($mapLocationName);
$mapLocations = array_values($uniqueLocations);
$uniqueCoords = array_unique($coordinates);
$mapCoords = array_unique($coordinates);
$coordsLength = count($mapCoords);
$labelEventNames = array();
$eventLabelIndex = 0;
      
for($i=0; $i < count($mapEventNames); $i++) {
    $before = $i - 1;
    if ($i !=0) { 
        if($mapLocationName[$i] != $mapLocationName[$before]) {
            $eventLabelIndex++;
            $eventString = $mapEventNames[$i];
            $labelEventNames[$eventLabelIndex] = $eventString;
        } else { 
        $labelEventNames[$eventLabelIndex] = $labelEventNames[$eventLabelIndex]."</b></br> then </br><b>"  .$mapEventNames[$i];
        } 
    } else {
        $labelEventNames[$eventLabelIndex] = $mapEventNames[$i];
    }
}
          
?>
  </head>

  <body>
            <div class="intro-header">
		<div class="col-xs-12 text-center abcen1">
			<h3 class="h1_home wow fadeIn" data-wow-delay="0.4s" id="intro"></h3>
		</div>  
        <!-- /.container -->
		<div class="col-xs-12 text-center abcen wow fadeIn">
			<div class="button_down "> 
				<a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#whatis"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a>
			</div>
		</div>
    </div>
        
      </br>
    <header role="banner">
        <img id="advertisement" src="getImage.php" alt="Testing" > 
      </header>
    </br>
</br>
    <div class="container">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
    
    <nav class="navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#home">Select a Day</a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					 <li class="menuItem"><a href="index.php">Today</a></li>
            <li class="menuItem"><a href="index2.php">Tomorrow</a></li>
            <li class="menuItem"><a href="index3.php"><span id="day 3"></span></a></li>
            <li class="menuItem" ><a href="index4.php"><span id="day 4"></span></a></li>
            <li class="menuItem"><a href="index5.php"><span id="day 5"></span></a></li>
            <li class="menuItem" ><a href="index6.php"><span id="day 6"></span></a></li>
            <li class="menuItem" ><a href="index7.php"><span id="day 7"></span></a></li>
				</ul>
			</div>
		   
		</div>
	</nav>     
        
        
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>University of Maryland</h1>
        <h2 class="lead">Chalking is a thing of the past - check out our interactive map to see whats happening on campus.</h2> 
    <ul id="eventDisplay">
        <li>
                <div id="map"> 
                </div>
        </li>
        <li>
        </br>
            <p><a class="btn btn-primary" href="#" role="button">Map Not Appearing? Refresh Here</a></p>
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
                  <div class="timeline-badge"> </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title"><?php echo $eventNames[$i];?></h4>
                      <p><small class="lead2"><?php echo date("g:i A", strtotime($startTime[$i]))." - " .date("g:i A", strtotime($endTime[$i]));?></small></p>
                        <p><div class="timeline-location"><?php echo $locationName[$i];?></div></p>
                      <p><div class="timeline-cost"><?php echo $eventCost[$i];?></div></p>
                    <p><div class="timeline-description"><?php echo htmlentities($eventDescription[$i]);?></div></p>
                <a class="btn btn-embossed btn-primary" href="<?php echo $eventLink[$i]?>" role="button">More Info </a>
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
                      <p><small class="lead2"><?php echo date("g:i A", strtotime($startTime[$i]))." - " .date("g:i A", strtotime($endTime[$i]));?></small></p>
                        <p><div class="timeline-location"><?php echo $locationName[$i];?></div></p>
                      <p><div class="timeline-cost"><?php echo $eventCost[$i];?></div></p>
                    <p><div class="timeline-description"><?php  echo $eventDescription[$i];?></div></p>
<a class="btn btn-embossed btn-primary" href="<?php echo $eventLink[$i]?>" role="button">More Info </a>
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

<!-- Example row of columns -->
    
     <div class="row">
        <div class="col-lg-4">
          <h3>Want to submit a non-profit event?</h3>
          <h4 class="lead">Want to market a free event on Event Eye? Not-for-profit events are free to submit through our event submission form! For questions or more information, please contact eventeyeapp@gmail.com. </h4>
          <p><a class="btn btn-primary" href="freeEventPage.php" role="button">Submit Nonprofit Event &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h3>Want to submit a for-profit event?</h3>
          <h4 class="lead">Want to market a for-profit event on Event Eye? Fill out our Event Submission Form below to receive pricing information and see payment options. Let us help make your event successful at little cost to you! For questions or more information, please contact eventeyeapp@gmail.com. 
            </h4>
          <p><a class="btn btn-primary" href="eventForm.php" role="button">Submit Event &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h3>Interested in advertising on Event Eye?</h>
          <h4 class="lead">Interested in posting an advertisement on the Event Eye site? Submit advertisement information using our Advertisement Submission Form below and let us help bring traffic to your organization or event. Pricing dependent on duration or advertisement. 
            </h4>
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
        function initMap() {
            var mapDiv = document.getElementById('map');
            map = new google.maps.Map(mapDiv, {
                center: {lat: 38.98676, lng: -76.942619},
                zoom: 15
            });
        <?php if ($noEvents == 0) { ?>
             var polygon_int = 0;
            var polygons = [];
            var infoWindow;
            var map;
            var eventNames = <?php echo json_encode ($labelEventNames)?>;
            var eventStart =<?php echo json_encode ($startTime)?>;
            var eventEnd = <?php echo json_encode ($endTime)?>;
            var eventLoc = <?php echo json_encode ($mapLocations)?>;
            
            <?php 
        if ($coordsLength != 0)  {
            foreach($uniqueCoords as $a){ ?>
                var polygon = new google.maps.Polygon({
                polygonID : polygon_int,
                paths: [<?=$a?>],
                strokeColor: '#000000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor:'#00EE00',
                fillOpacity: 0.35
        });
        polygon_int++;
        polygons.push(polygon);
        polygon.setMap(map);
        polygon.addListener('click', showDetails);
        infoWindow = new google.maps.InfoWindow;
        <?php 
            }
        }
        }?>
        
            function showDetails(event) {   
            var polygonID = this.polygonID;
            var contentString = '<b>' + eventNames[polygonID] +'</b> <br>'+ eventLoc[polygonID];
            infoWindow.setContent(contentString);
            infoWindow.setPosition(event.latLng);
            infoWindow.open(map);
        }
        }

      </script>
      <script>
        //getting today's date for the page and writing it  
        var weekday = new Array(7);  
        weekday[0]=  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
          
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth();
        var yyyy = today.getFullYear();
        var monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"
                        ];
          
         //getting the dates to list on the top bar
            
        var dayTwo = new Date();
        dayTwo.setDate(dayTwo.getDate() + 1);
        var d2 = dayTwo.getDate();
        var m2 = dayTwo.getMonth();
          
          
          
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
        var day6 = daySix.getDay();
        document.getElementById("day 6").innerHTML = monthNames[m6] + " "  + d6;
        
        document.getElementById("pageDate").innerHTML = monthNames[m6] + " " + d6 + ", " + yyyy;  
        document.getElementById("intro").innerHTML = 
        weekday[day6] + ", " + monthNames[m6] + " " + d6;
        
            
        var daySeven = new Date();
        daySeven.setDate(daySeven.getDate() + 6);
        var d7 = daySeven.getDate();
        var m7 = daySeven.getMonth();
        document.getElementById("day 7").innerHTML = monthNames[m7] + " "  + d7;
          
      
      </script>
       <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
	<!-- StikyMenu -->
	<script src="js/stickUp.min.js"></script>
	<script type="text/javascript">
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
		});
	  });
	
	</script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
	<script src="js/classie.js"></script>
	<script src="js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 
      <!-- callback function for map -->
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
  </body>
</html>