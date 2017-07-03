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
    <title>Marketing Form</title>

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
      </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'>
</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
// setting timezone 
error_reporting(E_ALL ^ E_DEPRECATED);
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
    
$sql = "SELECT advertisementID, eventID, imageFile, displayStartDate, displayEndDate, sponsor, payPalEmail, advertiserEmail FROM advertisements WHERE displayEndDate >= '" . $date . "' AND paymentStatus = 'Completed' ORDER BY displayStartDate ASC";

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
$startDates = array();
$endDates = array();

while ($row = mysql_fetch_assoc($result)) {
    $startDates[$index] = $row["displayStartDate"];
    $endDates[$index] = $row["displayEndDate"];
    $index++;
}

$dateCount = count($startDates);
      
$adSql = "SELECT MAX(advertisementID) AS id FROM advertisements";
$result = mysql_query($adSql);
$row = mysql_fetch_assoc($result);
$eventID = $row['id']+1;
?>  
    
    
  </head>

  <body>
    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
      
<a href="index.php">
<button type="button" class="btn btn-primary" id="back-button">
  <i class="fa fa-arrow-left" aria-hidden="true"></i> Return to this Week's Events
</button>
</a>        
        
</div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h2>Advertisement Submission Form</h2>
        <p class="lead">Market your for-profit events on Event Eye!</p>
          <p><div class="description-small">Are you looking to get the word out about your organization and increase event attendance? Consider posting an advertisement on the Event Eye website. All advertisements are displayed on a 728x90 pixel banner across the top of our site for the length of time you specify. Pricing for advertisements is dependent on duration, and payment is collected via PayPal. Submit your advertisement idea to Event Eye using the Advertisement Submission Form below to get started and send all additional questions to eventeyeapp@gmail.com.</div> </p>
        </div>
        <p><div id="warning"></div></p>
        <form class="form-horizontal" id="adForm" name="adForm"role="form" method="POST" data-toggle="validator" enctype="multipart/form-data" action="https://www.sandbox.paypal.com/cgi-bin/webscr" target="_top">

    <div class="form-group">
        <label class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="firstName" id="fName" placeholder="John" required>
        </div>
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="lastName" id="lName" placeholder="Doe" onblur="testFunction()" value="" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="contactEmail" placeholder="example@domain.com" value="" name="email" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Event ID (if applicable)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="eventID" name="eventID" placeholder="Best Event Ever" value="" onblur="testFunction()">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Image File</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="advertisementImage" name="imageFile" accept="image/*">
        </div>
    </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" >Image Alt</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="imageAlt" name="alt" placeholder="Please describe your image." value="" onblur="testFunction()" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Display Start Date</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="startDate" placeholder="YYYY-MM-DD" value="" name="startDate" onblur="checkDate()" required>
            </br>
             <p>You may display your event for up to 10 days, at $25 a day. If you're interested in reserving a space for more than 10 days, please email us at eventeyeapp@gmail.com</p>
            <p class="lead3">The following date ranges are not available. If you submit your advertisement for any date within these ranges, it will not appear during the taken dates and Event Eye will not be responsible:</p>
            <?php for($i=0; $i< $dateCount; $i++) { ?>
            </br>
            <p class="lead3"><?php echo $startDates[$i];?> - <?php echo $endDates[$i];?></p>
            <?php } 
            if ($dateCount == 0) { ?>
            </br>
                <p class="lead3">All dates are currently available.</p>
            
           <?php }
            ?>
    </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Event Sponsor</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sponsor" placeholder="Club Name, Company Name, etc." value="" onblur="testFunction()" name="sponsor" required>
        </div>
    </div>
    <div class="form-group">  

<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="VRZ4BA377XTBG">
<input type="hidden" name="item_name" value="marketing">
    <input type="hidden" name="invoice" value="<?php echo $eventID; ?>">
<label class="col-sm-2 control-label">Display Time</label>
<table>
<tr><td><input type="hidden" name="on0" value="Days">Days</td></tr><tr><td><select name="os0" id="days">
	<option value="1 Day">1 Day $25.00 USD</option>
	<option value="2 Days">2 Days $50.00 USD</option>
	<option value="3 Days">3 Days $75.00 USD</option>
	<option value="4 Days">4 Days $100.00 USD</option>
	<option value="5 Days">5 Days $125.00 USD</option>
	<option value="6 Days">6 Days $150.00 USD</option>
	<option value="7 Days">7 Days $175.00 USD</option>
	<option value="8 Days">8 Days $200.00 USD</option>
	<option value="9 Days">9 Days $225.00 USD</option>
	<option value="10 Days">10 Days $250.00 USD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"  onclick="submitToDatabase()">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

        
</div>
</form>

      <!-- Example row of columns -->

      <!-- Site footer -->
      <footer class="footer">
      </footer>

    </div> <!-- /container -->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 
    <script>
        function checkDate() {
            var date1 = new Date(document.getElementById("startDate").value);
            
            var days = document.getElementById("days").selectedIndex + 1;

            var date2 = date1;
            date2.setDate(date1.getDate() + days);

            var dateStartArray = <?php echo json_encode($startDates); ?>;
            
            var dateCountTotal = <?php echo json_encode($dateCount); ?>;
            
            var dateEndArray = <?php echo json_encode($endDates); ?>;
            var check = 0;
  
            for (i=0; i < parseInt(dateCountTotal); i++) {
                var from = new Date(dateStartArray[i]);
                var to = new Date(dateEndArray[i]);
                if (((date1 >= from) && (date1 <= to)) || ((date2 <= from) && (date2 >= to))) {
                   alert("We're sorry, at least one of the dates you selected is unavailable. Please choose a different set of dates.");
                    return false;
                } else {
                }
            } 
             
        }
        function submitToDatabase() {
                var custom = document.getElementById('advertisementImage').files[0];
                var firstName = document.getElementById('fName').value;
                    var lastName = document.getElementById('lName').value;
                    var email = document.getElementById('contactEmail').value;
                    var eventID = document.getElementById('eventID').value;
                    var alt = document.getElementById('imageAlt').value;
                    var startDate = document.getElementById('startDate').value;
                    var sponsor = document.getElementById('sponsor').value;
                
            if ((firstName != null) && (firstName != "") && (lastName != null) && (lastName != "") && (email != null) && (email != "") && (alt != null) && (alt != "") && (startDate != null) && (startDate != "") && (sponsor != null) && (sponsor != "")) {
                
            var data = new FormData($('#adForm')[0]);
                
                $.ajax({
                    type: 'POST',
                    url: 'advertisementSubmit.php',
                    data: data,
                    success: function() {
                    },
                    error: function() {
                    }, 
                    cache: false,
                    contentType: false,
                    processData: false,
                    
                    });
            }
            
            return false;
    }
    
        
    </script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js">
      
    </script>
  </body>
</html>